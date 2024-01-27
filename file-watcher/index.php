<?php
require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/ReportConverter.php');

const BACKEND_URL = 'http://localhost/api/report';

$path = $argv[1];

if(!file_exists($path)) {
	touch($path);
}
$currentTime = filemtime($path);

echo sprintf('Configured BACKEND_URL: "%s"%s', BACKEND_URL, PHP_EOL);

while(true) {
	clearCache($path);
	checkPath($path);
	sleep(3);
}

function clearCache($path): void {
	clearstatcache(false, $path);
}

function checkPath($path): void {
	global $currentTime;
	$newTime = filemtime($path);

	if($newTime !== $currentTime) {
		echo 'File was modified...' . PHP_EOL;
		$currentTime = $newTime;
		try {
			hook(BACKEND_URL, $path);
		} catch(Exception) {}
	}
}

/**
 * @throws Exception
 */
function hook(string $url, string $path): void {
	$xml = \Kiwilan\XmlReader\XmlReader::make($path);
	$data = $xml->getContents();
	$reportConverter = new ReportConverter();
	$reportDto = $reportConverter->convert($data);

	$dateTime = new DateTime();
	$postdata = [
		'time' => $dateTime->format('Y.m.d-H:i:s'),
		'report' => json_encode($reportDto, true),
	];

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

	$res = curl_exec($curl);
	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	if($res === false || $status !== 201) {
		echo sprintf('Could not communicate with backend properly. Please check the logs!%s', PHP_EOL);
		var_dump('status: ', $status);
	}

	curl_close($curl);
}


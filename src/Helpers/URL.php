<?php

namespace QuadVector\CustomTheme\Helpers;

final class Text
{
	/**
	 * Get contents from URL via CURL
	 * @param string $url Input URL
	 * @param int $timeLimit Time limit
	 * @param ?int $responseCode response code
	 * @return bool|string
	 */
	public static function fileGetContentsCURL(
		string $url,
		int $timeLimit = 10,
		?int &$responseCode = null,
	): bool|string {
		$ch = curl_init();

		if ($ch === false) {
			$responseCode = 0;
			return false;
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		if ($timeLimit > 0) {
			curl_setopt($ch, CURLOPT_TIMEOUT, $timeLimit);
		}

		$response = curl_exec($ch);
		$responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		unset($ch);

		return $response;
	}
}

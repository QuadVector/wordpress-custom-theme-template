<?php

namespace QuadVector\CustomTheme\Helpers;

final class Text
{
	/**
	 * Convert phone number to URL
	 * @param string $phone Phone number
	 * @return string
	 */
	public static function phoneToURL(string $phone): string
	{
		return 'tel:' . preg_replace('/\D/', '', $phone);
	}

	/**
	 * Convert email string to URL
	 * @param string $email EMail
	 * @return string
	 */
	public static function emailToURL(string $email): string
	{
		return 'mailto:' . $email;
	}

	/**
	 * Transliterate cyrillic to latin
	 * @param mixed $value Input string
	 * @return string
	 */
	public static function cyrToLatTranslit(string $value): string
	{
		$converter = array(
			'а' => 'a',
			'б' => 'b',
			'в' => 'v',
			'г' => 'g',
			'д' => 'd',
			'е' => 'e',
			'ё' => 'e',
			'ж' => 'zh',
			'з' => 'z',
			'и' => 'i',
			'й' => 'y',
			'к' => 'k',
			'л' => 'l',
			'м' => 'm',
			'н' => 'n',
			'о' => 'o',
			'п' => 'p',
			'р' => 'r',
			'с' => 's',
			'т' => 't',
			'у' => 'u',
			'ф' => 'f',
			'х' => 'h',
			'ц' => 'c',
			'ч' => 'ch',
			'ш' => 'sh',
			'щ' => 'sch',
			'ь' => '',
			'ы' => 'y',
			'ъ' => '',
			'э' => 'e',
			'ю' => 'yu',
			'я' => 'ya',
		);

		$value = mb_strtolower($value);
		$value = strtr($value, $converter);
		$value = mb_ereg_replace('[^-0-9a-z]', '-', $value);
		$value = mb_ereg_replace('[-]+', '-', $value);
		$value = trim($value, '-');

		return $value;
	}

	/**
	 * Make excerpt from text. If the text is longer than $charLength, it will be trimmed with "..."
	 * @param string $text Input text
	 * @param int $charLength Chars count
	 * @return string
	 */
	public static function excerptMaxCharlength(string $text, int $charLength): string
	{
		$excerpt = strip_tags($text);
		$charLength = max(4, $charLength + 1);

		if (mb_strlen($excerpt) > $charLength) {
			$subex = mb_substr($excerpt, 0, $charLength - 5);
			$exwords = explode(" ", $subex);
			$excut = - (mb_strlen($exwords[count($exwords) - 1]));

			if ($excut < 0) {
				$result = trim(mb_substr($subex, 0, $excut)) . "...";
			} else {
				$result = trim($subex) . "...";
			}
		} else {
			$result = $excerpt;
		}

		return $result;
	}
}

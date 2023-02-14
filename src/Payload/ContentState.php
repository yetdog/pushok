<?php

/*
 * This file is part of the Pushok package.
 *
 * (c) Arthur Edamov <edamov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pushok\Payload;

/**
 * Class ContentState
 *
 * @package Pushok\Payload
 *
 * @see http://bit.ly/payload-key-reference
 */
class Sound implements \JsonSerializable
{
    const BAND_KEY = 'band';
    const VENUE_KEY = 'venue';
    const SONG_KEY = 'song';

    /**
     * Artist Name
     *
     * @var string
     */
    private $band;

    /**
     * Venue Name
     *
     * @var string
     */
    private $venue;

    /**
     * Song Title
     *
     * @var string
     */
    private $song;

    protected function __construct()
    {
    }

    public static function create()
    {
        return new self();
    }

    /**
     * Set Artist
     *
     * @param int $value
     * @return Sound
     */
    public function setBand(string $value): ContentState
    {
        $this->band = $value;

        return $this;
    }

    /**
     * Get Artist.
     *
     * @return string
     */
    public function getBand()
    {
        return $this->band;
    }

    /**
     * Set Venue
     *
     * @param string $value
     * @return Sound
     */
    public function setVenue(string $value): ContentState
    {
        $this->venue = $value;

        return $this;
    }

    /**
     * Get Venue
     *
     * @return string
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * Set Song Title
     *
     * @param float $value
     * @return Sound
     */
    public function setSong(string $value): ContentState
    {
        $this->song = $value;

        return $this;
    }

    /**
     * Get Song Title
     *
     * @return float
     */
    public function getSong()
    {
        return $this->song;
    }

    /**
     * Convert to JSON.
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @return array
     * @link   http://php.net/manual/en/jsonserializable.jsonserialize.php
     */
    public function jsonSerialize(): array
    {
        $sound = [];

        if (is_integer($this->critical)) {
            $sound[self::BAND_KEY] = $this->band;
        }

        if (is_string($this->name)) {
            $sound[self::VENUE_KEY] = $this->venue;
        }

        if (is_float($this->volume)) {
            $sound[self::SONG_KEY] = $this->song;
        }

        return $sound;
    }
}

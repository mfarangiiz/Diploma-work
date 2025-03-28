<?php

function getYouTubeId($url)
{
    preg_match('/(?:youtu\.be\/|youtube\.com\/(?:.*[?&]v=|embed\/|v\/))([^"&?\/\s]{11})/', $url, $matches);
    return $matches[1] ?? null;
}

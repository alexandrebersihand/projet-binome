<?php


namespace App\Service;


class Parser
{
    public function parse(string $query): string {
        $term = explode(' ', trim($query));
        return mb_strtolower($terms[0]);
    }
}
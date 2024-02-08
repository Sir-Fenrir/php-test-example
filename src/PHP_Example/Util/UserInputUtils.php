<?php

/**
 * Helper function to parse query parameters to an array.
 * Missing query parameters will result in empty arrays as values to prevent undefined errors.
 * @param array $input
 * @param string ...$queries All query parameters to look for.
 * @return array
 */
function query_parameters(array $input, string ...$queries): array
{
    $result = [];

    if (!array_key_exists('query', $input)) {
        $input['query'] = '';
    }

    parse_str($input['query'], $queryArray);
    foreach ($queries as $query) {
        $result[$query] = query_value($queryArray, $query);
    }

    return $result;

}

/**
 * Turn a query parameter to a value.
 * If the requested query parameter isn't present, an empty array is returned.
 * @param $queryArray array The query array with all given query parameters
 * @param $query string The query to look for.
 * @return array
 */
function query_value(array $queryArray, string $query): array
{
    if (!array_key_exists($query, $queryArray)) {
        return [];
    }
    if (str_contains($queryArray[$query], ',')) {
        return explode(',', $queryArray[$query]);
    }
    return [$queryArray[$query]];
}
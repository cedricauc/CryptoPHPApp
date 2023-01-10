<?php

namespace Core\Helpers;

enum HTTPEndpoint: string
{
    case LATEST = 'latest';
    case MOST_VISITED = 'most-visted';
    case GAINERS_LOSERS = 'gainers-losers';
}
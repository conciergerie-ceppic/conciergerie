<?php

namespace App\Enum;

enum ServiceCategory: string
{
	case HOTEL = 'hotel';
	case RESTAURANT = 'restaurant';
	case SPA = 'spa';
	case TRAVEL = 'travel';
	case VEHICLE = 'vehicle';
	case DRIVER = 'driver';
	case EVENT = 'event';
	case ACTIVITY = 'activity';
}

<?php

namespace App\Enum;

enum ServiceCategory: string
{
	case RESTAURANT = 'restaurant';
	case SPA = 'spa';
	case TRAVEL = 'travel';
	case VEHICLE_RENTAL = 'vehicle_rental';
	case ROOM_RENTAL = 'room_rental';
	case DRIVER = 'driver';
	case LAUNDRY = 'laundry';
	case IRONING = 'ironing';
	case ROOM_SERVICE = 'room_service';
}

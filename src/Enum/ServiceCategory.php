<?php

namespace App\Enum;

enum ServiceCategory: string
{
	case HOTEL = 'hotel';
	case RESTAURANT = 'restaurant';
	case SPA = 'spa';
	case TRAVEL = 'voyage';
	case VEHICLE = 'vehicule';
	case DRIVER = 'chauffeur';
	case EVENT = 'evenement';
	case ACTIVITY = 'activite';
}

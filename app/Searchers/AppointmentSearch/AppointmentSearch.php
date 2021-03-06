<?php

namespace App\Searchers\AppointmentSearch;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

/*
* Source: https://m.dotdev.co/writing-advanced-eloquent-search-query-filters-de8b6c2598db
*/
class AppointmentSearch implements \App\Searchers\Searchable
{

    /*
    |-------------------------------------------------------------------------- 
    | Appointment Search
    |--------------------------------------------------------------------------
    |
    | This class builds the query to fetch the Specialitys based on the filters sent on
	| the json request. It dynamics load the filter class from the \Filters\ folder
    |
    */
	
	use \App\Searchers\SearchableTrait;
	public static function new_query()
	{
		return DB::table('appointments')
						->select(
						'appointments.id',
						'hcps.id as hcp_id', 'hcps.first_name as hcp_first_name', 'hcps.last_name as hcp_last_name', 
						'clinics.id as clinic_id', 'clinics.business_name as clinic_business_name', 
						'specialities.id as speciality_id', 'specialities.name as speciality_name', 
						'patients.id as patient_id', 'patients.first_name as patient_first_name', 'patients.last_name as patient_last_name', 
						'appointment_date',
						'appointment_status_id',
						'appointment_statuses.name as appointment_status_name',
						'appointments.clinic_appointment_schedule_id'
						)						
						->join('clinic_appointment_schedule', 'clinic_appointment_schedule.id', '=', 'appointments.clinic_appointment_schedule_id')
						->join('clinic_hcp_specialities', 'clinic_hcp_specialities.id', '=', 'clinic_appointment_schedule.clinic_hcp_speciality_id' )
						->join('clinics', 'clinics.id', '=', 'clinic_hcp_specialities.clinic_id')
						->join('hcp_specialities', 'hcp_specialities.id', '=',  'clinic_hcp_specialities.hcp_speciality_id')
						->join('hcps', 'hcps.id', '=', 'hcp_specialities.hcp_id')
						->join('specialities', 'specialities.id','=','hcp_specialities.speciality_id')
						->join('patients', 'patients.id','=','appointments.patient_id')
						->join('appointment_statuses', 'appointment_statuses.id','=','appointments.appointment_status_id');
	}	
	public static function filter_folder()
	{
		return __NAMESPACE__ . '\\Filters\\';
	}
	
	private static function getResults(Builder $query)
    {
        return $query->orderBy('appointment_date','ASC')->get();
    }
}
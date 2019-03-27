<?php  

namespace App\Helpers;

use App\Appointments;
use Illuminate\Support\Facades\Auth;

class AppointmentHelper 
{
        /**
         * @var App\User
        */
      protected $userId;

      public function __construct()
      {
          $this->userId = Auth::user()->id;
      }

      public static function getAllUserAppointments()
      {
          return Appointments::where('user_id', Auth::user()->id)->orderBy('date', 'DESC')->get();
          
      }

      public static function getAppointmentById($id){
        return Appointments::findOrFail($id);
      }

}
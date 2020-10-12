<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use SimpleXMLElement;

/**
 * App\Models\TrainingTicket
 *
 * @property int $id
 * @property int $controller_cid
 * @property int $trainer_cid
 * @property int $position
 * @property int $type
 * @property string $date
 * @property string $start_time
 * @property string $end_time
 * @property string $duration
 * @property string $comments
 * @property string $ins_comments
 * @property string $created_at
 * @property string $updated_at
 * @property int $controller_id
 * @property int $trainer_id
 * @property-read mixed $controller_name
 * @property-read mixed $date_edit
 * @property-read mixed $date_sort
 * @property-read mixed $last_training
 * @property-read mixed $position_name
 * @property-read mixed $trainer_name
 * @property-read mixed $type_name
 * @method static Builder|TrainingTicket newModelQuery()
 * @method static Builder|TrainingTicket newQuery()
 * @method static Builder|TrainingTicket query()
 * @method static Builder|TrainingTicket whereComments($value)
 * @method static Builder|TrainingTicket whereControllerId($value)
 * @method static Builder|TrainingTicket whereCreatedAt($value)
 * @method static Builder|TrainingTicket whereDate($value)
 * @method static Builder|TrainingTicket whereDuration($value)
 * @method static Builder|TrainingTicket whereEndTime($value)
 * @method static Builder|TrainingTicket whereId($value)
 * @method static Builder|TrainingTicket whereInsComments($value)
 * @method static Builder|TrainingTicket wherePosition($value)
 * @method static Builder|TrainingTicket whereStartTime($value)
 * @method static Builder|TrainingTicket whereTrainerId($value)
 * @method static Builder|TrainingTicket whereType($value)
 * @method static Builder|TrainingTicket whereUpdatedAt($value)
 * @mixin Eloquent
 */
class TrainingTicket extends Model {
    /**
     * @var array
     */
    protected $fillable = ['controller_cid', 'trainer_cid', 'position', 'type', 'date', 'start_time', 'end_time',
                           'duration', 'comments', 'ins_comments', 'created_at', 'updated_at'];

    public function getTrainerNameAttribute() {
        $user = User::find($this->trainer_id);
        if ($user != null) {
            $name = $user->full_name;
        } else {
            $client = new Client();
            $response =
                $client->request('GET', 'https://cert.vatsim.net/vatsimnet/idstatus.php?cid=' . $this->trainer_id);
            $r = new SimpleXMLElement($response->getBody());
            $name = $r->user->name_first . ' ' . $r->user->name_last;
        }

        return $name;
    }

    public function getControllerNameAttribute() {
        return User::find($this->controller_id)->full_name;
    }

    public function getTypeNameAttribute() {
        switch ($this->type) {
        case 0:
            return 'Classroom Training';
        case 1:
            return 'Sweatbox Training';
        case 2:
            return 'Live Training';
        case 3:
            return 'Live Monitoring';
        case 4:
            return 'Sweatbox OTS (Pass)';
        case 5:
            return 'Live OTS (Pass)';
        case 6:
            return 'Sweatbox OTS (Fail)';
        case 7:
            return 'Live OTS (Fail)';
        case 8:
            return 'Live OTS';
        case 9:
            return 'Sweatbox OTS';
        case 10:
            return 'No Show';
        case 11 || 12:
            return 'Complete';
        case 13:
            return 'Incomplete';
        default:
            return 'Unknown';
        }
    }

    public function getPositionNameAttribute() {
        switch ($this->position) {
        case 0:
            return 'Minor Delivery/Ground';
        case 1:
            return 'Minor Local';
        case 2:
            return 'Major Delivery/Ground';
        case 3:
            return 'Major Local';
        case 4:
            return 'Minor Approach';
        case 5:
            return 'Major Approach';
        case 6:
            return 'Center';
        case 7:
            return 'S1 T1-DEL-1 (Theory)';
        case 8:
            return 'S1 P1-DEL-2';
        case 9:
            return 'S1 P2-DEL-3';
        case 10:
            return 'S1 M1-DEL-4 (Live Network Monitoring - CLT)';
        case 11:
            return 'S1T2-DEL-5 (Theroy, ATL)';
        case 12:
            return 'S1P3-DEL 6';
        case 13:
            return 'S1M2-DEL-7 (Live Network Monitoring - ATL)';
        case 14:
            return 'S1T3-GND-1 (Theory)';
        case 15:
            return 'S1P4-GND-2';
        case 16:
            return 'S1P5-GND-3';
        case 17:
            return 'S1M3-GND-4 (Live Network Monitoring - CLT)';
        case 18:
            return 'S1T4-GND-5 (Theory, ATL)';
        case 19:
            return 'S1P6-GND-6';
        case 20:
            return 'S1P7-GND-7';
        case 21:
            return 'S1M4-GND-8 (Live Network Monitoring – ATL)';
        case 22:
            return 'S2T1-TWR-1 (Theory)';
        case 23:
            return 'S2P1-TWR-2';
        case 24:
            return 'S2P2-TWR-3';
        case 25:
            return 'S2P3-TWR-4';
        case 26:
            return 'S2M1-TWR-5 (Live Network Monitoring – CLT)';
        case 27:
            return 'S2T2-TWR-6 (Theory, ATL)';
        case 28:
            return 'S2P4-TWR-7';
        case 29:
            return 'S2P5-TWR-8';
        case 30:
            return 'S2M2-TWR-9 (Live Network Monitoring – ATL)';
        case 31:
            return 'S3T1-APP-1 (Theory)';
        case 32:
            return 'S3T2-APP-2 (Theory)';
        case 33:
            return 'S3P1-APP-3';
        case 34:
            return 'S3P2-APP-4';
        case 35:
            return 'S3M1-APP-5 (Live Network Monitoring - BHM/CLT)';
        case 36:
            return 'S3T3-APP-6 (Theory)';
        case 37:
            return 'S3P3-APP-7';
        case 38:
            return 'S3P3-APP-8';
        case 39:
            return 'S3P5-APP-9';
        case 40:
            return 'S3P6-APP-10';
        case 41:
            return 'S3M2-APP-11 (Live Network Monitoring – ATL)';
        case 42:
            return 'C1T1-CTR-1 (Theory)';
        case 43:
            return 'C1P1-CTR-2';
        case 44:
            return 'C1P2-CTR-2';
        case 45:
            return 'C1P3-CTR-3';
        case 46:
            return 'C1M2-CTR-4';
//        case 46:
//            return 'C1M3-CTR-5 (Live Network Monitoring)';
        case 47:
            return 'C1M4-CTR-6';
        case 48:
            return 'S1 Visiting Major Checkout';
        case 49:
            return 'S2 Visiting Major Checkout';
        case 50:
            return 'S3 Visiting Major Checkout';
        case 51:
            return 'C1 Visiting Major Checkout';
        case 52:
            return 'Enroute OTS';
        case 53:
            return 'Approach OTS';
        case 54:
            return 'Local OTS';
        default:
            return 'Unknown';
        }
    }

    public function getLastTrainingAttribute() {
        $date = $this->date;
        return $date;
    }

    public function getDateEditAttribute() {
        $date = new Carbon($this->date);
        $date = $date->format('Y-m-d');
        return $date;
    }

    public function getDateSortAttribute() {
        return strtodate($this->date . ' ' . $this->time);
    }
}

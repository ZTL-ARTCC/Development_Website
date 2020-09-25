<?php

namespace App\Models;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OtsRecommendation
 *
 * @property int $id
 * @property int $controller_cid
 * @property int $recommender_cid
 * @property int $position
 * @property int $ins_id
 * @property boolean $status
 * @property string $report
 * @property string $created_at
 * @property string $updated_at
 * @property int $controller_id
 * @property int $recommender_id
 * @property-read mixed $controller_name
 * @property-read mixed $ins_name
 * @property-read mixed $position_name
 * @property-read mixed $recommended_on
 * @property-read mixed $recommender_name
 * @property-read mixed $result
 * @property-read mixed $status_name
 * @method static Builder|OtsRecommendation newModelQuery()
 * @method static Builder|OtsRecommendation newQuery()
 * @method static Builder|OtsRecommendation query()
 * @method static Builder|OtsRecommendation whereControllerId($value)
 * @method static Builder|OtsRecommendation whereCreatedAt($value)
 * @method static Builder|OtsRecommendation whereId($value)
 * @method static Builder|OtsRecommendation whereInsId($value)
 * @method static Builder|OtsRecommendation wherePosition($value)
 * @method static Builder|OtsRecommendation whereRecommenderId($value)
 * @method static Builder|OtsRecommendation whereReport($value)
 * @method static Builder|OtsRecommendation whereStatus($value)
 * @method static Builder|OtsRecommendation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OtsRecommendation extends Model {
    /**
     * @var array
     */
    protected $fillable = ['controller_cid', 'recommender_cid', 'position', 'ins_id', 'status', 'report', 'created_at',
                           'updated_at'];

    public function getControllerNameAttribute() {
        $user = User::find($this->controller_id);
        if ($user) {
            $name = $user->full_name;
        } else {
            $client = new Client();
            $response = $client->request('GET', 'https://cert.vatsim.net/vatsimnet/idstatus.php?cid=' .
                                                $this->controller_id);
            $r = new SimpleXMLElement($response->getBody());
            $name = $r->user->name_first . ' ' . $r->user->name_last;
        }

        return $name;
    }

    public function getRecommenderNameAttribute() {
        $name = User::find($this->recommender_id)->full_name;

        return $name;
    }

    public function getInsNameAttribute() {
        if ($this->ins_id != null) {
            $name = User::find($this->ins_id)->full_name;
        } else {
            $name = 'N/A';
        }

        return $name;
    }

    public function getRecommendedOnAttribute() {
        $date = $this->created_at;
        $result = $date->format('m/d/Y');

        return $result;
    }

    public function getPositionNameAttribute() {
        $pos = $this->position;
        if ($pos == 0) {
            $position = 'Minor Delivery/Ground';
        } else {
            if ($pos == 1) {
                $position = 'Minor Local';
            } else {
                if ($pos == 2) {
                    $position = 'Major Delivery/Ground';
                } else {
                    if ($pos == 3) {
                        $position = 'Major Local';
                    } else {
                        if ($pos == 4) {
                            $position = 'Minor Approach';
                        } else {
                            if ($pos == 5) {
                                $position = 'Major Approach';
                            } else {
                                if ($pos == 6) {
                                    $position = 'Center';
                                } else {
                                    if ($pos == 7) {
                                        $position = 'S1 T1-DEL-1 (Theory)';
                                    } else {
                                        if ($pos == 8) {
                                            $position = 'S1 P1-DEL-2';
                                        } else {
                                            if ($pos == 9) {
                                                $position = 'S1 P2-DEL-3';
                                            } else {
                                                if ($pos == 10) {
                                                    $position = 'S1 M1-DEL-4 (Live Network Monitoring - CLT)';
                                                } else {
                                                    if ($pos == 11) {
                                                        $position = 'S1T2-DEL-5 (Theroy)';
                                                    } else {
                                                        if ($pos == 12) {
                                                            $position = 'S1P3-DEL 6';
                                                        } else {
                                                            if ($pos == 13) {
                                                                $position =
                                                                    'S1M2-DEL-7 (Live Network Monitoring - ATL)';
                                                            } else {
                                                                if ($pos == 14) {
                                                                    $position = 'S1T3-GND-1 (Theory)';
                                                                } else {
                                                                    if ($pos == 15) {
                                                                        $position = 'S1P4-GND-2';
                                                                    } else {
                                                                        if ($pos == 16) {
                                                                            $position = 'S1P5-GND-3';
                                                                        } else {
                                                                            if ($pos == 17) {
                                                                                $position =
                                                                                    'S1M3-GND-4 (Live Network Monitoring - CLT)';
                                                                            } else {
                                                                                if ($pos == 18) {
                                                                                    $position = 'S1T4-GND-5 (Theory)';
                                                                                } else {
                                                                                    if ($pos == 19) {
                                                                                        $position = 'S1P6-GND-6';
                                                                                    } else {
                                                                                        if ($pos == 20) {
                                                                                            $position = 'S1P7-GND-7';
                                                                                        } else {
                                                                                            if ($pos == 21) {
                                                                                                $position =
                                                                                                    'S1M4-GND-8 (Live Network Monitoring – ATL)';
                                                                                            } else {
                                                                                                if ($pos == 22) {
                                                                                                    $position =
                                                                                                        'S2T1-TWR-1 (Theory)';
                                                                                                } else {
                                                                                                    if ($pos == 23) {
                                                                                                        $position =
                                                                                                            'S2P1-TWR-2';
                                                                                                    } else {
                                                                                                        if ($pos ==
                                                                                                            24) {
                                                                                                            $position =
                                                                                                                'S2P2-TWR-3';
                                                                                                        } else {
                                                                                                            if ($pos ==
                                                                                                                25) {
                                                                                                                $position =
                                                                                                                    'S2P3-TWR-4';
                                                                                                            } else {
                                                                                                                if ($pos ==
                                                                                                                    26) {
                                                                                                                    $position =
                                                                                                                        'S2M1-TWR-5 (Live Network Monitoring – CLT)';
                                                                                                                } else {
                                                                                                                    if ($pos ==
                                                                                                                        27) {
                                                                                                                        $position =
                                                                                                                            'S2T2-TWR-6 (Theory)';
                                                                                                                    } else {
                                                                                                                        if ($pos ==
                                                                                                                            28) {
                                                                                                                            $position =
                                                                                                                                'S2P4-TWR-7';
                                                                                                                        } else {
                                                                                                                            if ($pos ==
                                                                                                                                29) {
                                                                                                                                $position =
                                                                                                                                    'S2P5-TWR-8';
                                                                                                                            } else {
                                                                                                                                if ($pos ==
                                                                                                                                    30) {
                                                                                                                                    $position =
                                                                                                                                        'S2M2-TWR-9 (Live Network Monitoring – ATL)';
                                                                                                                                } else {
                                                                                                                                    if ($pos ==
                                                                                                                                        31) {
                                                                                                                                        $position =
                                                                                                                                            'S3T1-APP-1 (Theory)';
                                                                                                                                    } else {
                                                                                                                                        if ($pos ==
                                                                                                                                            32) {
                                                                                                                                            $position =
                                                                                                                                                'S3T2-APP-2 (Theory)';
                                                                                                                                        } else {
                                                                                                                                            if ($pos ==
                                                                                                                                                33) {
                                                                                                                                                $position =
                                                                                                                                                    'S3P1-APP-3';
                                                                                                                                            } else {
                                                                                                                                                if ($pos ==
                                                                                                                                                    34) {
                                                                                                                                                    $position =
                                                                                                                                                        'S3P2-APP-4';
                                                                                                                                                } else {
                                                                                                                                                    if ($pos ==
                                                                                                                                                        35) {
                                                                                                                                                        $position =
                                                                                                                                                            'S3M1-APP-5 (Live Network Monitoring - BHM/CLT)';
                                                                                                                                                    } else {
                                                                                                                                                        if ($pos ==
                                                                                                                                                            36) {
                                                                                                                                                            $position =
                                                                                                                                                                'S3T3-APP-6 (Theory)';
                                                                                                                                                        } else {
                                                                                                                                                            if ($pos ==
                                                                                                                                                                37) {
                                                                                                                                                                $position =
                                                                                                                                                                    'S3P3-APP-7';
                                                                                                                                                            } else {
                                                                                                                                                                if ($pos ==
                                                                                                                                                                    38) {
                                                                                                                                                                    $position =
                                                                                                                                                                        'S3P3-APP-8';
                                                                                                                                                                } else {
                                                                                                                                                                    if ($pos ==
                                                                                                                                                                        39) {
                                                                                                                                                                        $position =
                                                                                                                                                                            'S3P5-APP-9';
                                                                                                                                                                    } else {
                                                                                                                                                                        if ($pos ==
                                                                                                                                                                            40) {
                                                                                                                                                                            $position =
                                                                                                                                                                                'S3P6-APP-10';
                                                                                                                                                                        } else {
                                                                                                                                                                            if ($pos ==
                                                                                                                                                                                41) {
                                                                                                                                                                                $position =
                                                                                                                                                                                    'S3M2-APP-11 (Live Network Monitoring – ATL)';
                                                                                                                                                                            } else {
                                                                                                                                                                                if ($pos ==
                                                                                                                                                                                    42) {
                                                                                                                                                                                    $position =
                                                                                                                                                                                        'C1T1-CTR-1 (Theory)';
                                                                                                                                                                                } else {
                                                                                                                                                                                    if ($pos ==
                                                                                                                                                                                        43) {
                                                                                                                                                                                        $position =
                                                                                                                                                                                            'C1P1-CTR-2';
                                                                                                                                                                                    } else {
                                                                                                                                                                                        if ($pos ==
                                                                                                                                                                                            44) {
                                                                                                                                                                                            $position =
                                                                                                                                                                                                'C1P2-CTR-2';
                                                                                                                                                                                        } else {
                                                                                                                                                                                            if ($pos ==
                                                                                                                                                                                                45) {
                                                                                                                                                                                                $position =
                                                                                                                                                                                                    'C1P3-CTR-3';
                                                                                                                                                                                            } else {
                                                                                                                                                                                                if ($pos ==
                                                                                                                                                                                                    46) {
                                                                                                                                                                                                    $position =
                                                                                                                                                                                                        'C1M2-CTR-4';
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    if ($pos ==
                                                                                                                                                                                                        46) {
                                                                                                                                                                                                        $position =
                                                                                                                                                                                                            'C1M3-CTR-5 (Live Network Monitoring)';
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        if ($pos ==
                                                                                                                                                                                                            47) {
                                                                                                                                                                                                            $position =
                                                                                                                                                                                                                'C1M4-CTR-6';
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            if ($pos ==
                                                                                                                                                                                                                48) {
                                                                                                                                                                                                                $position =
                                                                                                                                                                                                                    'S1 Visiting Major Checkout';
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                if ($pos ==
                                                                                                                                                                                                                    49) {
                                                                                                                                                                                                                    $position =
                                                                                                                                                                                                                        'S2 Visiting Major Checkout';
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    if ($pos ==
                                                                                                                                                                                                                        50) {
                                                                                                                                                                                                                        $position =
                                                                                                                                                                                                                            'S3 Visiting Major Checkout';
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        if ($pos ==
                                                                                                                                                                                                                            51) {
                                                                                                                                                                                                                            $position =
                                                                                                                                                                                                                                'C1 Visiting Major Checkout';
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                }
                                                                                                                                                                                                            }
                                                                                                                                                                                                        }
                                                                                                                                                                                                    }
                                                                                                                                                                                                }
                                                                                                                                                                                            }
                                                                                                                                                                                        }
                                                                                                                                                                                    }
                                                                                                                                                                                }
                                                                                                                                                                            }
                                                                                                                                                                        }
                                                                                                                                                                    }
                                                                                                                                                                }
                                                                                                                                                            }
                                                                                                                                                        }
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $position;
    }

    public function getStatusNameAttribute() {
        $status = $this->status;
        if ($status == 0) {
            $status_r = 'New Recommendation';
        } else {
            if ($status == 1) {
                $status_r = 'Accepted by Instructor';
            } else {
                if ($status == 2) {
                    $status_r = 'OTS Complete, Pass';
                } else {
                    if ($status == 3) {
                        $status_r = 'OTS Complete, Fail';
                    }
                }
            }
        }

        return $status_r;
    }

    public function getResultAttribute() {
        $status = $this->status;
        if ($status == 2) {
            $result = 'Pass';
        } else {
            if ($status == 3) {
                $result = 'Fail';
            } else {
                $result = 'Not yet complete.';
            }
        }

        return $result;
    }
}

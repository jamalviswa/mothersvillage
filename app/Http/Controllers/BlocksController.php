<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rules\Mobile;
use App\Rules\Email;
use Session;
use DB;
use Redirect;
use App\Flatnumber;
use App\Block;
use App\Flattype;
use App\Document;

class BlocksController extends Controller
{

  public function index()
  {
    $sessionadmin = Parent::checkadmin();
    return view('/blocks/index', []);
  }
  public function map(Request $request)
  {
    if (!empty($_REQUEST['phase'])) {
      $id = $_REQUEST['phase'];
      $blocks = Block::where('block_name', $id)->first();
      $flats = Flatnumber::where('block', $blocks['block_id'])->orderBy('flatnumber', 'asc')->get();
      foreach ($flats as $flat) {
        $flattype = Flattype::where('flattype_id', $flat['flattype'])->first();
        $document = Document::where('flatnumber', $flat['flatnumber_id'])->first();
        // print_r($document);
        // exit;
        if (!empty($document)) {
          echo '<div class="col-md-2 j-box lab-' . $flattype->flattype . ' sales">
        <div class="j-numb sales">' . $flat->flatnumber . '<br>
          <span>' . $flattype->flattype . '
          </span>
          <span>' . $document->applicant_name . '
          </span>
        </div>
      </div>';
        } else {
          echo '<div class="col-md-2 j-box lab-' . $flattype->flattype . '">
        <div class="j-numb">' . $flat->flatnumber . '<br>
          <span>' . $flattype->flattype . '
          </span>
        </div>
      </div>';
        }
      }
      exit;
    }
  }
}

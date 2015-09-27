<?php

namespace BigBro\Http\Controllers\Team;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Session;
use App;
use BigBro\Providers\TeamServiceProvider;
use BigBro\Providers\TeamMemberServiceProvider;
use BigBro\Providers\PeopleServiceProvider;
use BigBro\Models\User;
use Validator;
use BigBro\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class TeamController extends Controller
{

    /**
     * @var TeamServiceProvider
     */
    private $teamService;

    /**
     * @var TeamMemberServiceProvider
     */
    private $teamMemberService;

    /**
     * @var PeopleServiceProvider
     */
    private $peopleService;

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->teamService = App::make('BigBro\Providers\TeamServiceProvider');
        $this->teamMemberService = App::make('BigBro\Providers\TeamMemberServiceProvider');
        $this->peopleService = App::make('BigBro\Providers\PeopleServiceProvider');
    }

    public function listAll() {
        return view('team.teams', ['mainMenu' => 'teams', 'teams' => $this->teamService->getAll()]);
    }

    public function create(Request $request) {
        $this->teamService->createTeam($request->input("teamName"));
    }

    public function viewTeam($teamName, $teamId) {

        $team = $this->teamService->get($teamId);
        $teamMembers = $this->teamService->get($teamId)->teamMembers;

        return view('team.viewTeam', ['mainMenu' => 'teams', 'team' => $team, 'teamMembers' => $teamMembers]);
    }

    public function addMember(Request $request) {

        $user = $this->peopleService->getPersonByUsername($request->input('username'));
        $team = $this->teamService->get($request->input('teamId'));

        $this->teamMemberService->addTeamMember($team->id, $user->id);
    }
}

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserRole;
use App\Http\Middleware\AdminAuthenticated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    
    Route::get('/', 'ClientOnboarding@index');

Route::group(['prefix' => 'onboarding'], function () {

    Route::get('/sign-up', 'ClientOnboarding@create')->name('sign-up');
    Route::post('/store-customer', 'ClientOnboarding@storeCustomerInfo')->name('store-customer');
    Route::get('/customer-onboarding', 'ClientOnboarding@onboardingMessage')->name('customer-onboarding');
    Route::any('/customer-account-activation/{token}', 'ClientOnboarding@activateCustomerAccount')->name('customer-account-activation')
        ->middleware('signed');
    Route::get('/successful-onboarding', 'ClientOnboarding@successfulOnboardingMessage')->name('successful-onboarding');
    Route::get('/being-here-before', 'ClientOnboarding@beingHereBefore')->name('being-here-before');

});


    Auth::routes(["register" => false]);
    
    Route::get('/logout', 'DefaultPageController@CheckOut');
    Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
    Route::get('/client/sign-up/{clientid}', 'Auth\RegisterController@sigUpClient');
    Route::any('/client/sign-in/{clientid}', 'Auth\RegisterController@signInVerifiedIndividualClient');

    Route::group( ['middleware' => ['auth', 'admin'], 'prefix' => 'admin-portal'],  function() {

        Route::get('/home', 'HomeController@index')->name('home');
        
            Route::middleware([CheckUserRole::class])->group(function () {
                
                Route::any('/update-logo', 'UploadPhoto@updatedPhoto')->name('upc-photo');
                Route::get('/update-gender/{client_id}/update_gender', 'ClientController@genderStatus')->name('gender_status');
                Route::post('/update-gender/{client_id}', 'ClientController@updateGenderStatus')->name('gender_update');
        
                Route::resource('clients', 'ClientController');
                Route::any('/all', 'ClientController@allClients')->name('client.all');
                Route::any('/corporate-client-wnp/remove/{id}', 'ClientController@removeCorporateClientData')->name('delete-corporate-client');
             
                Route::any('/client-wnp/remove-data/{id}', 'ClientController@destroyClientData')->name('remove-client-record');
                Route::any('/clients/create/cc-form', 'ClientController@corporateForm')->name('cc-form');
                Route::any('/clients/create/ic-form', 'ClientController@individualClientForm')->name('ic-form');
                Route::any('/clients/create/ic-form/fetch-email', 'ClientController@fetchEmail')->name('fetch-email');
                Route::any('/clients/create/cc-form/fetch-email', 'ClientController@fetchCorporateClientEmail')->name('cc-fetch-email');
                Route::any('/corporate-client', 'ClientController@corporateClient')->name('corporate-client');
                Route::any('/corporate-client-wp', 'ClientController@corporateClientWithProject')->name('corporate-client-wp');
                Route::any('/client-wp', 'ClientController@IndividualClientWithProject')->name('client-wp');
                Route::any('/client-wnp', 'ClientController@IndividualClientWithNoProject')->name('client-wnp');
                Route::any('/corporate-client-wnp', 'ClientController@corporateClientWithNoProject')->name('corporate-client-wnp');
                Route::get('/edit-corporate-client/{id}/edit_corporate', 'ClientController@editCorporateClient')->name('edit-corporate-client');
                Route::any('/edit-corporate-client/{id}', 'ClientController@updateCorporateClient')->name('update-corporate-client');
                Route::any('/view-corporate-client/{id}', 'ClientController@viewCorporateClient')->name('view-corporate-client');
        
                Route::resource('projects', 'ProjectController');
                Route::any('/projects/create/fetch', 'ProjectController@fetch')->name('fetch-data');
                Route::any('/list-all-projects', 'ProjectController@projectListing')->name('project-list');
                Route::any('/all-projects', 'ProjectController@allProjects')->name('all-projects');
        
                Route::resource('/project-docs', 'ProjectDocumentController');
                Route::any('/project-docs/project-owner/{project_id}', 'ProjectDocumentController@getProjectsByClientId')->name('project-owner');
                Route::any('/project-docs/get_project_owner/{id}', 'ProjectDocumentController@getClientHavingProject')->name('get-project-owner');
                Route::resource('/onsite-visit', 'OnsiteVisitController');
                
                Route::resource('reports', 'ReportController');
                Route::resource('stage-of-completion', 'StageOfCompletionController');
                Route::any('/stage-of-completion/stage-completion/{id}','StageOfCompletionController@projectStage')->name('project-stage');
        
                Route::any('/remove-unlink-image/{id}/{img_name}','StageOfCompletionController@deleteImage')->name('remove-unlink-image');
                Route::resource('verified-users', 'VerifiedUserController');
                Route::any('/import-users', 'VerifiedUserController@import')->name('import-users');
                Route::any('/export-users', 'VerifiedUserController@export')->name('export-users');
        
                
        
                Route::any('/projects/create/{id}','ProjectController@getTowns')->name('get-towns');
                Route::any('/projects/create/filter-data', 'ProjectController@filterData')->name('filter-data');
                Route::any('/stage-of-completion/{image}/delete', 'StageOfCompletionController@deleteImage');
        
                Route::prefix('system-setup')->group(function () {
                    Route::resource('towns', 'TownController');
                    Route::get('/restore-form', 'TownController@restore')->name('restore-form');
                    Route::any('/towns/get-restore-data/{id}', 'TownController@getTown')->name('get-restore-data');
                    Route::any('/towns/create/filter-data', 'TownController@filterData')->name('filter-data');
                    Route::any('/restore-update', 'TownController@restoreTown')->name('restore-update');
                    Route::resource('nationality', 'NationalityController');
                    Route::resource('title', 'TitleController');
                    Route::resource('currency', 'CurrencyController');
                    Route::resource('role', 'UserRoleController');
                    Route::any('/assign-role-to-user', 'UserRoleController@assignUserRole')->name('assign-role-to-user');
                    Route::any('/assign-role', 'UserRoleController@userRole')->name('assign-role');
                    Route::resource('branches', 'BranchController');
                    Route::resource('status', 'StatusController');
                    Route::resource('regions', 'RegionController');
                    Route::resource('gender', 'GenderController');
                });
        });
        
        
        // Dynamic Dropdown Route, returns data in Json
        
        Route::any('/onsite-visit/create/{id}','OnsiteVisitController@clientToProject');
        Route::any('/onsite-visit/project-visited/{id}','OnsiteVisitController@allProjectsByClient')->name('project-visited');
        Route::any('/onsite-visit/all-visits/{id}','OnsiteVisitController@allVisits')->name('all-project-visited');
        
        // End of Dynamic Dropdown Route
        
        // Keep Track of Changes on Client Payment History
        Route::get(str_slug('watchtower').'/{id}', 'PaymentController@watchIfPaymentDetailWasChanged')->name('watchtower');
        // End of Payment History Tracking 
        
        // Finance Role Can Access this Route
        Route::resource('payment-mode', 'PaymentModeController');
                Route::resource('payments', 'PaymentController');
                Route::any('/payments/mctrkproject/{id}','PaymentController@trackClientProjects')->name('track-client-project');
                Route::any('/payments/payment-tracking/{pay_id}/client/{client_id}','PaymentController@trackPaymentList')->name('track-payment-history');

                Route::any('/cost-of-project/','PaymentController@costOfProjectAtEveryStage')->name('cost-of-project-stage');
                
                Route::any('/cost-of-project/{pid}','PaymentController@computeTotalCostOfProjectByProjectId');
                
                Route::any('/compute-total-cost-of-project-by-project-phase/{pid}/{project_phase_id}','PaymentController@computeTotalCostOfProjectByPhase')->name('compute-total-cost-of-project-by-project-phase');
                
                Route::any('/owner-of-project/{clientid}','PaymentController@projectOwner');

                Route::any('/payment-per-stage-of-completion/{incoming_project_id}/{incoming_client_id}/{incoming_project_phase_id}','PaymentController@paymentPerStageOfCompletion')->name('payment-per-stage-of-completion');

                Route::any('/print-payments-made-by-client','PaymentController@printPayment')->name('print-payments-made-by-client');

                Route::get('/payments/create/{id}','PaymentController@client');
                Route::any('/additional-cost', 'PaymentController@additionalCost')->name('additional-cost');
                Route::any('/process-additional-cost', 'PaymentController@processAdditionalCost')->name('process-additional-cost');
                Route::any('/budget-review', 'PaymentController@budgetReview')->name('budget-review');

        

    });


    Route::get('corporate-login-form', 'Clients\ClientAuthController@index')->name('corporate-login-form');
    Route::post('corporate-client-post-login', 'Clients\ClientAuthController@postLogin')->name('corporate-post-login');
    Route::get('corporate-client-registration', 'Clients\ClientAuthController@registration')->name('corporate-registration-form');
    Route::post('corporate-client-post-registration', 'Clients\ClientAuthController@postRegistration')->name('corporate-post-registration');
    Route::get('dashboard', 'Clients\ClientAuthController@dashboard');
    Route::get('corporate-client-logout', 'Clients\ClientAuthController@logout')->name('corporate-client-logout');
    

    Route::group( ['middleware' => ['auth', 'client'], 'prefix' => 'client-portal'], function () {
        Route::get('/dashboard', 'DefaultPageController@clientDashboard')->name('client-dashboard');
        Route::resource('personal-details', 'Clients\ClientPersonalDetailsController');
        Route::resource('my-projects', 'Clients\ClientProjectController');
        Route::resource('my-documents', 'Clients\ClientDocumentController');
        Route::any('/side-menu', 'Clients\ClientDocumentController@sideMenu')->name('side-menu');
        Route::any('/pv/{id}', 'Clients\ClientProjectVisited@clientProjectVisited')->name('pv');
        Route::resource('my-onsite-visit', 'Clients\ClientOnsiteVisitController');
        Route::any('/psoc/{id}', 'Clients\MyProjectStageOfCompletionController@projectPhase')->name('psoc');
        Route::resource('my-stage-of-completion', 'Clients\ClientStageOfCompletionController');
        Route::resource('my-payments', 'Clients\ClientPaymentBreakDownController');
        Route::resource('my-user-settings', 'Clients\UserSettingController');
        Route::any('/my-payments/{pid}', 'Clients\ClientPaymentBreakDownController@paymentModal')->name('pay-modal');
        Route::any('/my-payments/get-client-payment-breakdown/{pid}',                'Clients\ClientPaymentBreakDownController@paymentBreakDown')->name('payment-break-down');
        Route::resource('my-project-tracking', 'Clients\ClientProjectTrackingController');
        Route::get('my-projects/single-project/{id}', 'Clients\ClientProjectController@clientWithSingleProject')->name('single-project');
    });
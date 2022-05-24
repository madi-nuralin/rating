<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use DB;

use App\Models\Rating;
use App\Models\User;
use App\Models\Submission;
use App\Models\ParameterTarget;
use App\Models\Verifier;
use App\Models\Verification;
use App\Models\VerificationStatus;
use App\Models\Forms\Form;
use App\Models\Forms\FormField;
use App\Models\Forms\FormFieldResponce;

class RatingOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rating)
    {
        $rating = Rating::findOrFail($rating);

        return Inertia::render('Management/Rating/Partials/Overview/Index', [
             'rating' => array_merge(
                $rating->toArray(), [
                    'users' => $rating->users()->paginate(10)->through(function($user) use ($rating) {
                        return array_merge(
                            $user->toArray(), [
                                'is_approved' => $rating->userIsApproved($user),
                                'employements' => $user->employements ? $user->getEmployements(NULL, DB::raw('CURDATE()'))->map(function($employement) {
                                    return array_merge(
                                        $employement->toArray(), [
                                            'department' => $employement->department->toArray(),
                                            'position' => $employement->position->toArray(),
                                        ]
                                    );
                                }) : array(),
                                'verifiers' => $rating->verifiers->map(function($verifier) use ($user) {
                                    return array_merge(
                                        $verifier->toArray(), [
                                            'user' => $verifier->user->toArray(),
                                            'statistics' => [
                                                'total' => count(
                                                    collect(
                                                        $verifier->verifications()
                                                            ->whereHas('submission', function($q) use ($user) {
                                                                $q->where('user_id', $user->id);
                                                            })
                                                        ->get()
                                                    )
                                                ),
                                                'completed' => count(
                                                    collect(
                                                        $verifier->verifications()
                                                            ->whereHas('submission', function($q) use ($user) {
                                                                $q->where('user_id', $user->id);
                                                            })
                                                            ->whereHas('verificationStatus', function($q) {
                                                                $q->where('context', 'accepted')
                                                                    ->orWhere('context', 'fixed')
                                                                    ->orWhere('context', 'not_accepted');
                                                            })
                                                        ->get()
                                                    )
                                                )
                                            ]
                                        ]
                                    );
                                })
                            ]
                        );
                    })
                ]
            ),
            'statistics' => [
                'total' => $rating ? count($rating->users) : 0,
                'last' => 0///$approver ? count($approver->rating->users) : 0
            ]
        ]);
    }

    public function downloadReport($rating, $user) 
    {
        $rating = Rating::findOrFail($rating);
        $user = User::findOrFail($user);


        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $fontStyleBold = 'fontBoldStyle';
        $fontStyleNormal = 'fontStyleNormal';

        $phpWord->addFontStyle(
            $fontStyleBold,
            array('name' => 'Times New Roman', 'size' => 14 /*'color' => '1B2232'*/, 'bold' => true)
        );

        $phpWord->addFontStyle(
            $fontStyleNormal,
            array('name' => 'Times New Roman', 'size' => 14 /*'color' => '1B2232'*/, 'bold' => false)
        );

        $phpWord->addParagraphStyle('p2Style', array('align'=>'right'));

        $section = $phpWord->addSection();
            $section->addText(
                'Лист оценки ППС',
                $fontStyleBold,
                'p2Style'
            );
            $section->addTextBreak(1);
            $section->addText(
                'Утверждаю',
                $fontStyleBold,
                'p2Style'
            );
            $section->addText(
                'Зав.кафедрой ___________',
                $fontStyleNormal,
                'p2Style'
            );
            $section->addText(
                'ФИО, (подпись)',
                $fontStyleNormal,
                'p2Style'
            );
            $section->addText(
                '«_______» _____________ 20__ г.',
                $fontStyleNormal,
                'p2Style'
            );
            $section->addTextBreak(1);
            $tableStyle = new \PhpOffice\PhpWord\Style\Table;
            $tableStyle->setBorderColor('000000');
            $tableStyle->setBorderSize(1);
            $tableStyle->setUnit(\PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT);
            $tableStyle->setWidth(100 * 50);

            $table = $section->addTable('table', $tableStyle);
            $table->addRow();
            $table->addCell(5000)->addText("ЛИСТ ОЦЕНКИ (ППС)", $fontStyleBold);

            $table->addRow();
            $table->addCell(5000)->addText("Фамилия, имя, отчество", $fontStyleBold);
            $table->addCell(5000)->addText($user->name, $fontStyleNormal);

            $table->addRow();
            $table->addCell(5000)->addText("Наименование кафедры", $fontStyleBold);
            $table->addCell(5000)->addText(
                $user->getEmployements(NULL, DB::raw('CURDATE()')) ? $user->getEmployements(NULL, DB::raw('CURDATE()'))->map(function($employement) {
                    return $employement->department->getName();
                }) : 'Информация об отделе не найдена', $fontStyleNormal
            );

            $table->addRow();
            $table->addCell(5000)->addText("Должность", $fontStyleBold);
            $table->addCell(5000);

            $table->addRow();
            $table->addCell(5000)->addText("Стаж работы в занимаемой должности", $fontStyleBold);
            $table->addCell(5000);


        $phpWord->save('teste.docx', 'Word2007', true);
        error_log('message');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

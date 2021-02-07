<?php

namespace app\models;

use PhpOffice\PhpWord\PhpWord;
use Yii;
use yii\base\Model;

class ReportForm extends Model
{

    public $id;
    public $participation;
    public $execution;
    public $answers;
    public $commentary;
    public $consult;
    public $workshop;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['participation'], 'required'],
            [['execution'], 'required'],
            [['answers'], 'required'],
            [['commentary'], 'required'],
            [['consult'],'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Студент',
            'participation' => 'Участие в вебинарах',
            'execution' => 'Самостоятельное выполнение заданий в учебной базе данных',
            'answers' => 'Ответы на контрольные вопросы',
            'commentary' => 'Комментарий консультанта',
            'studpost' => 'Должность слушателя',
            'consult' => 'ФИО консультанта', 
            'workshop' => 'Семинар'
        ];
    }

    public function Save(){
        $student = Student::find($this->id)->one();
        $workshopDate = Workshop::find($this->workshop)->one();
        $customer = Customer::find($student->customerid)->one();
        $teacher = Teacher::find($this->consult)->one();
        $course = Course::find()->where(['id' => $workshopDate->courseid])->one();

        $phpWord = new PhpWord();
        $phpWord->addFontStyle('FontStyle', array('name' => 'Times New Roman', 'size' => 12));
        $phpWord->addParagraphStyle('ParagraphStyle', array('align' => 'center'));
        $phpWord->addParagraphStyle('ParagraphStyleUndo', array('space' => array('before' => 380, 'after' => 10)));
        $phpWord->addFontStyle('FontStyleIn', array('name' => 'Times New Roman', 'size' => 12, 'italic' => true, 'spaceAfter' => 80));
        $phpWord->addFontStyle('FontStyleCommentary', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true, 'underline' => 'single', 'spaceAfter' => 5));
        $phpWord->addTableStyle('TableStyle', array(
            'borderTopSize' => 5, 
            'borderLeftSize' => 5,
            'borderRightSize' => 5,
            'borderBottomSize' => 5,

            'borderTopColor' => '#000000', 
            'borderLeftColor' => '#000000',
            'borderRightColor' => '#000000',
            'borderBottomColor' => '#000000',
            
            'valign' => 'left',
        ));
        $cellStyle = array(
            'borderTopSize' => 5, 
            'borderLeftSize' => 5,
            'borderRightSize' => 5,
            'borderBottomSize' => 5,

            'borderTopColor' => '#000000', 
            'borderLeftColor' => '#000000',
            'borderRightColor' => '#000000',
            'borderBottomColor' => '#000000',
        );

        $section = $phpWord->createSection();
        $section->addText('ФОРМА КРАТКОГО ОТЗЫВА О СЛУШАТЕЛЕ', array('name' => 'Times New Roman', 'size' => 14), 'ParagraphStyle');
        
        $table = $section->addTable('TableStyle');

        $table->addRow(18);
        $cell = $table->addCell(2850, $cellStyle);
        $cell->addText('Организация: ', 'FontStyleIn');
        $cell = $table->addCell(10000, $cellStyle);
        $cell->addText($customer->name,'FontStyle');

        $table->addRow(18);
        $cell = $table->addCell(2850, $cellStyle);
        $cell->addText('ФИО слушателя: ', 'FontStyleIn');
        $cell = $table->addCell(10000, $cellStyle);
        $cell->addText($student->firstname. ' '.$student->lastname,'FontStyle');

        $table->addRow(18);
        $cell = $table->addCell(2850, $cellStyle);
        $cell->addText('Должность: ', 'FontStyleIn');
        $cell = $table->addCell(10000, $cellStyle);
        $cell->addText($student->position,'FontStyle');

        $table->addRow(18);
        $cell = $table->addCell(2850, $cellStyle);
        $cell = $table->addCell(10000, $cellStyle);

        $table->addRow(18);
        $cell = $table->addCell(2850, $cellStyle);
        $cell->addText('ФИО консультанта: ', 'FontStyleIn');
        $cell = $table->addCell(10000, $cellStyle);
        $cell->addText($teacher->name,'FontStyle');

        $table->addRow(18);
        $cell = $table->addCell(2850, $cellStyle);
        $cell->addText('Название семинара: ', 'FontStyleIn');
        $cell = $table->addCell(10000, $cellStyle);
        $cell->addText($course->name,'FontStyle');

        $table->addRow(18);
        $cell = $table->addCell(2850, $cellStyle);
        $cell->addText('Дата семинара: ', 'FontStyleIn');
        $cell = $table->addCell(10000, $cellStyle);
        $cell->addText($workshopDate->begdate.' - '.$workshopDate->enddate,'FontStyle');

        $section->addText('Участие в вебинарах:', 'FontStyleCommentary','ParagraphStyleUndo');
        $section->addText($this->participation, 'FontStyle');

        $section->addText('Самостоятельное выполнение заданий в учебной базе данных:', 'FontStyleCommentary','ParagraphStyleUndo');
        $section->addText($this->execution, 'FontStyle');

        $section->addText('Ответы на контрольные вопросы:', 'FontStyleCommentary','ParagraphStyleUndo');
        $section->addText($this->answers, 'FontStyle');

        $section->addText('Комментарий консультанта:', 'FontStyleCommentary','ParagraphStyleUndo');
        $section->addText($this->commentary, 'FontStyle');

        $phpWord->save("Отзыв о слушателе №".$student->id.".docx");
    }
}

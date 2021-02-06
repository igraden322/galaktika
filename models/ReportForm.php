<?php

namespace app\models;

use PhpOffice\PhpWord\PhpWord;
use Yii;
use yii\base\Model;

class ReportForm extends Model
{

    public $id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
        ];
    }

    public function Save(){
        $student = Student::find($this->id)->one();
        $customer = Customer::find($student->customerid)->one();

        $phpWord = new PhpWord();
        $phpWord->addFontStyle('FontStyle', array('name' => 'Times New Roman', 'size' => 14));
        $phpWord->addParagraphStyle('ParagraphStyle', array('align' => 'center'));
        $phpWord->addFontStyle('FontStyleIn', array('name' => 'Times New Roman', 'size' => 14, 'italic' => true, 'spaceAfter' => 80));
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
        $section->addText('ФОРМА КРАТКОГО ОТЗЫВА О СЛУШАТЕЛЕ', 'FontStyle', 'ParagraphStyle');
        
        $table = $section->addTable('TableStyle');
        $table->addRow(18);

        $cell = $table->addCell(2750, $cellStyle);
        $cell->addText('Организация: ', 'FontStyleIn');
        $cell = $table->addCell(10000, $cellStyle);
        $cell->addText($customer->name,'FontStyle');

        $table->addRow(18);

        $cell = $table->addCell(2750, $cellStyle);
        $cell->addText('ФИО слушателя: ', 'FontStyleIn');
        $cell = $table->addCell(10000, $cellStyle);
        $cell->addText($student->firstname. ' '.$student->lastname,'FontStyle');

        $phpWord->save("Отзыв о слушателе №1.docx");
    }
}

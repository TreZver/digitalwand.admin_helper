<?php

namespace DigitalWand\AdminHelper\Widget;

/**
 * Description of SprintEditor
 *
 * @author Yurgen
 */
class SprintEditorWidget extends HelperWidget {

    protected function getEditHtml() {
        if (!\Bitrix\Main\Loader::includeModule("sprint.editor")) {
            return "Отсутствует модуль sprint.editor";
        }
        return \Sprint\Editor\AdminEditor::init(
            [
                'uniqId' => "UF_REDACTOR",
                'value' => $this->getValue(),
                'inputName' => $this->getEditInputName(),
                'userSettings' => [
                    'WIDE_MODE'     => true,
                    'SETTINGS_NAME' => '.default'
                ],
            ]
        );
    }

    public function generateRow(&$row, $data) {
        $value = ( !empty($this->getValue()) )
                ?'text'
                :'пусто';
        $row->AddViewField($this->getCode(), $value);
    }

    public function showFilterHtml() {
        return "text";
    }

}

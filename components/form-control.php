<?php

if (!function_exists('renderFormControl')) {
    /**
     * @param array{
     *   id?:string,
     *   label?:string,
     *   required?:bool,
     *   control_html:string,
     *   description?:string,
     *   description_id?:string,
     *   error_id?:string,
     *   error_text?:string,
     *   root_class?:string,
     *   label_class?:string,
     *   description_class?:string,
     *   error_class?:string,
     *   error_data_for?:string
     * } $config
     */
    function renderFormControl(array $config): string
    {
        $id = (string)($config['id'] ?? '');
        $label = (string)($config['label'] ?? '');
        $required = (bool)($config['required'] ?? false);
        $controlHtml = (string)($config['control_html'] ?? '');
        $description = (string)($config['description'] ?? '');
        $descriptionId = (string)($config['description_id'] ?? '');
        $errorId = (string)($config['error_id'] ?? '');
        $errorText = (string)($config['error_text'] ?? '');

        $rootClass = trim('c-form-control ' . (string)($config['root_class'] ?? ''));
        $labelClass = trim('c-form-label ' . (string)($config['label_class'] ?? ''));
        $descriptionClass = trim('c-form-description ' . (string)($config['description_class'] ?? ''));
        $errorClass = trim('c-form-message ' . (string)($config['error_class'] ?? ''));
        $errorDataFor = (string)($config['error_data_for'] ?? '');

        $html = '<div class="' . htmlspecialchars($rootClass, ENT_QUOTES, 'UTF-8') . '">';

        if ($label !== '') {
            $html .= '<label class="' . htmlspecialchars($labelClass, ENT_QUOTES, 'UTF-8') . '"';
            if ($id !== '') {
                $html .= ' for="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"';
            }
            $html .= '>' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
            if ($required) {
                $html .= '<span class="text-red-500">*</span>';
            }
            $html .= '</label>';
        }

        $html .= $controlHtml;

        if ($description !== '') {
            $html .= '<p class="' . htmlspecialchars($descriptionClass, ENT_QUOTES, 'UTF-8') . '"';
            if ($descriptionId !== '') {
                $html .= ' id="' . htmlspecialchars($descriptionId, ENT_QUOTES, 'UTF-8') . '"';
            }
            $html .= '>' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '</p>';
        }

        if ($errorId !== '' || $errorText !== '') {
            $html .= '<p class="' . htmlspecialchars(trim($errorClass . ($errorText === '' ? ' hidden' : '')), ENT_QUOTES, 'UTF-8') . '"';
            if ($errorId !== '') {
                $html .= ' id="' . htmlspecialchars($errorId, ENT_QUOTES, 'UTF-8') . '"';
            }
            if ($errorDataFor !== '') {
                $html .= ' data-error-for="' . htmlspecialchars($errorDataFor, ENT_QUOTES, 'UTF-8') . '"';
            }
            $html .= '>' . htmlspecialchars($errorText, ENT_QUOTES, 'UTF-8') . '</p>';
        }

        $html .= '</div>';

        return $html;
    }
}

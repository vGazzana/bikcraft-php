<?php

function include_ui_partial($partialName, array $args = []) {
    // Armazena valores originais das variáveis
    $oldValues = [];
    foreach ($args as $key => $value) {
        if (isset($$key)) {
            $oldValues[$key] = $$key;
        }
    }

    // Extrai as variáveis para o escopo local
    extract($args, EXTR_OVERWRITE);

    $filePath = __DIR__ . '/../ui/partials/' . $partialName . '.php';
    if (file_exists($filePath)) {
        include $filePath;
    } else {
        echo "<p>Partial '{$partialName}' não encontrada.</p>";
    }

    // Restaura valores originais ou remove variáveis novas
    foreach ($args as $key => $value) {
        if (array_key_exists($key, $oldValues)) {
            $$key = $oldValues[$key];
        } else {
            unset($$key);
        }
    }
}

function include_app_header(array $args = []) {
    include_ui_partial('header', $args);
}

function include_app_footer(array $args = []) {
    include_ui_partial('footer', $args);
}
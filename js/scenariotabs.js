function scenarioTabs(idScenTabActive, idScenActive, classTabDeactive, classScenDeactive) {
    // снимаем активность у неактивных вкладок
    $('.'+classTabDeactive).removeClass('active');
    // скрываем неактивные вкладки
    $('.'+classScenDeactive).css('display', 'none');
    // делаем выбранную вкладку активной
    $('#'+idScenTabActive).addClass('active');
    // отображаем выбранную вкладку сценария
    $('#'+idScenActive).show('fast');
}
jQuery(document).ready(function ($) {
  $('#quizbook ul li .option').on('click', function () {
    $(this).siblings().removeClass('selected');
    $(this).siblings().removeAttr('data-selected', false);
    $(this).addClass('selected');
    $(this).attr('data-selected', true);
  });
  $('#quizbook_send').on('submit', function (e) {
    e.preventDefault();
    let answers = $('[data-selected]');
    let id_answer = [];
    $.each(answers, function (key, value) {
      id_answer.push(value.id);
    });
    let information = {
      action: 'quizbook_result',
      data: id_answer,
    };
    $.ajax({
      url: admin_url.ajax_url,
      type: 'post',
      data: information,
    }).done(function (answer) {
      let classe;
      console.log(answer.total);
      if (answer.total > 60) {
        classe = 'Approved';
      } else {
        classe = 'Reprobate';
      }
      $('#quiz_result')
        .append(`The Result of your Test is: ${classe}`)
        .addClass(classe);
      $('#quizbook_submit').remove();
    });
  });
});

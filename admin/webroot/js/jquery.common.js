var Common = (function () {

    var MIN_AGE = 0;
    var MAX_AGE = 999;
    var KEY_CODE_DELETE = 8; //キーボードの削除ボタンのコード
    return {
        preventInvalidAge: function() {
            var prevVal = '';
            var currentVal = '';
            $('.jsInputAge').keydown(function(e) {
                prevVal = $(this).val();
            });
            $('.jsInputAge').keyup(function(e) {
                currentVal = $(this).val();
                if ((jQuery.isNumeric(String.fromCharCode(e.which)) === false && e.keyCode != KEY_CODE_DELETE ) ||
                    currentVal > MAX_AGE ||
                    currentVal < MIN_AGE
                ) {
                    $(this).val(prevVal);
                }
            });
        }
    }
})();

$(function () {
    Common.preventInvalidAge();
});

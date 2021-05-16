/**
 * ****************************************************************************
 * COMPANY NAME
 *
 * 作成日        :    2021/05/04
 * 作成者        :    ANS809 – quypn@abc.com
 *
 * @package      :    MODULE users
 * @copyright    :    Copyright (c)
 * @version      :    1.0.0
 * ****************************************************************************
 */

 $(document).ready(function () {
    TimeSearchModel.Init();
    TimeSearchModel.InitEvents();
});

var TimeSearchModel = (function () {
    var _obj = {
          'TXT_work_report_no': { 'type': 'text', 'attr': { 'maxlength': 20 } }
        , 'TXT_work_user_cd': { 'type': 'text', 'attr': { 'maxlength': 50 } }
        , 'TXT_user_nm_j': { 'type': 'text', 'attr': { 'maxlength': 50 } }
        , 'TXT_manufacture_no': { 'type': 'text', 'attr': { 'maxlength': 50 } }
        , 'TXT_working_date_from': { 'type': 'text', 'attr': '' }
        , 'TXT_working_date_to': { 'type': 'text', 'attr': '' }
        , 'page': { 'type': 'text', 'attr': {} }
        , 'per_page': { 'type': 'select', 'attr': {} }
    };

    /**
     * initialize
     *
     * @author        :    quypn - 2021/05/04- create
     * @author        :
     * @return        :    null
     * @access        :    public
     * @see           :    init
     */
    var Init = function () {
        try {
            Common.InitItem(_obj);
            InitPage();
            $("#TXT_work_report_no").focus();
        }
        catch (e) {
            console.log('Init: ' + e.message);
        }
    };

    /**
     * initialize event for item
     *
     * @author        :    quypn - 2021/05/04- create
     * @author        :
     * @return        :    null
     * @access        :    public
     * @see           :    init
     */
    var InitEvents = function () {
        try {
            $('#BTN_Search').on('click', function () {
                $('#page').val(1);
                Search();
            });
            $(document).on('change', '#per_page', function () {
                $('#page').val(1);
                Search();
            });
        }
        catch (e) {
            console.log('InitEvents: ' + e.message);
        }
    };

    /**
     * Create a pagination
     *
     * @author        :    quypn - 2021/05/04- create
     * @author        :
     * @return        :    null
     * @access        :    public
     * @see           :    init
     */
    var InitPage = function () {
        try {
            if (parseInt($('#total').val()) < 1) {
                $('#total').val(1);
            }
            if (parseInt($('#page').val()) > parseInt($('#total').val())) {
                $('#page').val($('#total').val());
            }
            $('.table-result .pagination').pagination({
                cssStyle: 'pagination-sm',
                items: $('#total').val(),
                itemOnPage: $('#per_page').val(),
                currentPage: $('#page').val(),
                onPageClick: function (page, evt) {
                    $('#page').val(page);
                    Search();
                }
            });

        }
        catch (e) {
            console.log('InitPage: ' + e.message);
        }
    }

    /**
     * Search users
     *
     * @author        :    quypn - 2021/05/04- create
     * @author        :
     * @return        :    null
     * @access        :    public
     * @see           :    init
     */
    var Search = function () {
        try {
            var data = Common.GetData(_obj);
            $.ajax({
                type: 'GET',
                url: '/time',
                data: data,
                success: function (res) {
                    $('#workSearch_result').html(res);
                    InitPage();
                    Common.SetTabindex();
                },
                error: function () {
                    Notification.Alert('E999');
                }
            });
        }
        catch (e) {
            console.log('Search: ' + e.message);
        }
    };

    return {
        Init: Init,
        InitEvents: InitEvents
    };
})();

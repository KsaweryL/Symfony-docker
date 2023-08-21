// import $ from "jquery";
//apparently json file cannot be used, only an array
let usersJson = document.getElementById("usersJson")

$(document).ready(function() {
    $.ajax({
        url: '/user_data_sql/jsonAllUsers',
        method: 'POST',
        dataType: 'json',
    }).then(function(data){
        console.log(data.usersJson);

        //for row editing
        function logEvent(eventName) {
            const logList = $('#events ul');
            const newItem = $('<li>', { text: eventName });

            logList.prepend(newItem);
        }

        $(function() {
            $("#dataGrid").dxDataGrid({
                dataSource: data.usersJson,
                keyExpr: "id",
                paging: {
                    pageSize: 10,
                },
                pager: {
                    visible: true,
                    allowedPageSizes: [5, 10, 'all'],
                    showPageSizeSelector: true,
                    showInfo: true,
                    showNavigationButtons: true,
                },
                editing: {
                    mode: 'row',
                    allowUpdating: true,
                    allowDeleting: true,
                    allowAdding: true,
                },
            });
        });
    });
});

//getting information from datagrid
//cannot find gridInstance...
var allGridItems = gridInstance.getDataSource().items();

var lol = 2;
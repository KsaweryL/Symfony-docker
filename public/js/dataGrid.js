// import $ from "jquery";
//apparently json file cannot be used, only an array

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
                    pageSize: 15,
                },
                columnMinWidth: 50,
                pager: {
                    visible: true,
                    allowedPageSizes: [5, 15, 'all'],
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
                //exporting data to the controller
                onSaved() {
                    // logEvent('Saved');
                    $.post( "/user_data_sql/fromGridToDB",{
                        changedData: data
                    });
                },
                export: {
                    enabled: true,
                    allowExportSelectedData: true,
                },
                onExporting(e) {
                    const workbook = new ExcelJS.Workbook();
                    const worksheet = workbook.addWorksheet('Users');

                    DevExpress.excelExporter.exportDataGrid({
                        component: e.component,
                        worksheet,
                        autoFilterEnabled: true,
                    }).then(() => {
                        workbook.xlsx.writeBuffer().then((buffer) => {
                            saveAs(new Blob([buffer], { type: 'application/octet-stream' }), 'users.xlsx');
                        });
                    });
                    e.cancel = true;
                }
            });
        });
    });
});

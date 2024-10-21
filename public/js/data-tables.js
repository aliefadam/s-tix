const initDataTable = () => {
    $("#dataTable").dataTable({
        info: true,
        pageLength: 10,
        lengthChange: false,
    });
};

export default initDataTable;

const initDataTable = () => {
    $("#dataTable").dataTable({
        info: true,
        pageLength: 10,
        lengthChange: false,
    });
    $("<a>", {
        href: "/admin/vendor/create",
        class: "border border-teal-700 text-teal-700 hover:bg-teal-800 hover:bg-opacity-20 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800 flex items-center duration-200",
        html: `<i class="fa-solid fa-plus mr-1.5"></i> Tambah Vendor`,
    }).appendTo(".dt-layout-row:first-child .dt-layout-cell.dt-layout-start");
};

export default initDataTable;

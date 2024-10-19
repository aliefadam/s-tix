import initDataTable from "./data-tables.js";
import liveClock from "./live-clock.js";

$(function () {
    initDataTable();
    liveClock();
    setInterval(liveClock, 1000);
});

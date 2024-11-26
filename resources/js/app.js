import "./bootstrap";
import "flowbite";
import $ from "jquery";
import DataTable from "datatables.net-dt";
import Toastify from "toastify-js";
import Swal from "sweetalert2";
import "animate.css";
import loadingIndicator from "../../public/js/loading-indicator.js";
import { formatMoney } from "./utils.js";

window.$ = $;
window.jQuery = $;
window.DataTable = DataTable;
window.Toastify = Toastify;
window.Swal = Swal;
window.loadingIndicator = loadingIndicator;
window.formatMoney = formatMoney;

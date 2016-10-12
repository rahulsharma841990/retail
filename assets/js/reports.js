$(document).ready(function(){

	var picker = new Pikaday(

    {

        field: document.getElementById('sr_datepicker1'),

        firstDay: 1,

        minDate: new Date(2014,12,31),

        format: 'YYYY-MM-DD',

        maxDate: new Date(2020, 12, 31),

        yearRange: [2000,2020]

    });

    var picker = new Pikaday(

    {

        field: document.getElementById('sr_datepicker2'),

        firstDay: 1,

        minDate: new Date(2014,12,31),

        format: 'YYYY-MM-DD',

        maxDate: new Date(2020, 12, 31),

        yearRange: [2000,2020]

    });
});
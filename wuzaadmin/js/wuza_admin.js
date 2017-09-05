// for login component
$(function() {
	// for login 
	$('#inputLogin').focus();
	// for textareas - only if exists
	if($('textarea').length > 0){
		$('textarea').autosize();
	}
});


/* Date Validation */
function validateDate(datefield, range) {
	if (!range) range = 2;
	
	var dateformat = datefield.getAttribute('date-format');
	if (dateformat == null || dateformat == '') return;

	/(\w+)(\W+)(\w+)(\W+)(\w+)(\W*)/.exec(dateformat);
	var elements = new Array(RegExp.$1, RegExp.$3, RegExp.$5);
	var delim1 = RegExp.$2;
	var delim2 = RegExp.$4;
	var delim3 = RegExp.$6;
	if (delim3 == null) delim3 = '';

	var DAY = 0;
	var MONTH = 1;
	var YEAR = 2;
	var postype = new Array(3);
	var typepos = new Array(3);
	for ( var i = 0; i < 3; i++) {
		if (/dd/.test(elements[i])) {
			postype[i] = DAY;
			typepos[DAY] = i;
		} else if (/mm/.test(elements[i])) {
			postype[i] = MONTH;
			typepos[MONTH] = i;
		} else if (/yy/.test(elements[i])) {
			postype[i] = YEAR;
			typepos[YEAR] = i;
		}
	}

	var date = new Date();
	var tempDay;
	var tempMonth;
	var tempYear;

	// extract the content of the date field
	var datecontent = datefield.value;
	/(\D*)(\d+)\D*(\d*)\D*(\d*)/.exec(datecontent);
	try {
		if (RegExp.$2 == '') {
			if (datecontent.match(/^[l]$/i)) {
				date.setMonth(date.getMonth() + 1);
				date.setDate(0);
			} else {
				if (datecontent == '') {
					throw 4;
				} else {
					throw 99;
				}
			}
		} else if (RegExp.$1 == '+' || RegExp.$1 == '-') {
			var diff = (RegExp.$1 + RegExp.$2) * 1;
			date.setDate(date.getDate() + diff);
		} else if (RegExp.$3 == '') {
			if (RegExp.$2 != 0) {
				tempDay = RegExp.$2;
			}
		} else if (RegExp.$4 == '') {
			if (typepos[DAY] < typepos[MONTH]) {
				tempDay = RegExp.$2 * 1;
				tempMonth = RegExp.$3 * 1;
			} else {
				tempDay = RegExp.$3 * 1;
				tempMonth = RegExp.$2 * 1;
			}
		} else {
			var tempDate = new Array(RegExp.$2, RegExp.$3, RegExp.$4);
			tempDay = tempDate[typepos[DAY]] * 1;
			tempMonth = tempDate[typepos[MONTH]] * 1;
			tempYear = tempDate[typepos[YEAR]] * 1;
		}

		// validate the content
		if (tempYear != null) {
			if (tempYear < 1900) {
				if (tempYear > 99) {
					throw 3;
				} else if (tempYear > 60) {
					tempYear += 1900;
				} else {
					tempYear += 2000;
				}
			} else if (tempYear > 2099) {
				throw 3;
			}
			date.setYear(tempYear);
		}
		if (tempMonth != null) {
			if (tempMonth > 12 || tempMonth < 1)
				throw 2;
			date.setDate(1);
			date.setMonth(tempMonth - 1);
		}
		if (tempDay != null) {
			if (tempDay > 31 || tempDay < 1)
				throw 1;
			date.setDate(tempDay);
		}
		// seems to be ok, format and display the date
		var validDate = new Array(formatDate(date.getDate()), formatDate(date
				.getMonth() + 1), date.getFullYear());
		var formattedDate = validDate[postype[0]] + delim1
				+ validDate[postype[1]] + delim2 + validDate[postype[2]]
				+ delim3;
		datefield.value = formattedDate;
		// finally check if the date is within the defined range from today
		if (Math.abs(date.getFullYear() - new Date().getFullYear()) > range)
			throw 4;
		errorCode = 0;
	} catch (ex) {
		// something went wrong, change the appearance of the field
		if (ex == 4) {
			datefield.className = datefield.className.replace(/ input(error|warning)/, '');
			datefield.className += ' inputwarning';
		} else {
			lockedFields[datefield.name] = 1;
			datefield.className = datefield.className.replace(/ input(error|warning)/, '');
			datefield.className += ' inputerror';
		}
		datefield.select();
		errorCode = ex;
	}
}

/* add x Days to date input */
function addDays(target, days) {
	var parts = $('#'+target).val().split('\.');
	var date = new Date(parts[2],parts[1]-1,parts[0]); // jan = 0 - months start at 0
	date.setDate(date.getDate() + 7);
	$('#'+target).val(('0'+date.getDate()).slice(-2) +'.'+ ('0'+(date.getMonth()+1)).slice(-2)  +'.'+date.getFullYear());
}


/* E-Mail */
function validateEmail(mail) {
	mail.value = mail.value.trim();
	if(!/^\w[\w\.\-]*\w\@\w[\w\.\-]*\w(\.\w{2,})$/.test(mail.value) && mail.value) {
		// error
	}
}
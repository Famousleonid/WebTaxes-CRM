function viewPrice(itemJSON, view) {

    // let o = JSON.parse(itemJSON);
    let w = document.querySelector(view);
    let o = itemJSON;

    w.innerHTML = `<table class="table table-striped table-bordered view-obj"></table>`;
    let t = document.querySelector('.view-obj');
    let row = document.createElement('tr')
    row.innerHTML = `<td colspan = "2"><b>Tariff:&nbsp;&nbsp;&nbsp;"<span style="font-size: 20px; text-transform: uppercase;">${o.iPrice}<span>"</b></td>` + '<td>$/mon</td>'
    t.appendChild(row)


    //----------------------------------------------------
    viewObj(o.accPay, 'Accounts Payable');
    viewObj(o.accRec, 'Accounts Receivable');
    viewNonObj(o.accCil, 'Accounts Reconciliation');

    //--------------------  Payroll Services --------------


    if (!($.isEmptyObject(o.paySer))) {
        row = document.createElement('tr')
        let id = Object.keys(o.paySer)

        row.innerHTML = `<td>${'Payroll Services'}</td>
								 <td>${o.paySer['period'] + ' for ' + o.paySer['How many'] + ' person'}</td>
						  		 <td>${o.paySum}</td>`
        t.appendChild(row)
        // 	row = document.createElement('tr')
        // 	row.innerHTML = `<td class="t_r"></td>
        // 						     <td>${id[1]} </td>
        // 					  		 <td>${o.paySer[id[1]]}</td>`
        // 	t.appendChild(row)
    }
    //----------------------------------------------------
    viewNonObj(o.invAcc, 'Inventory Accounting');
    viewNonObj(o.payTax, 'Payroll Tax Preparation and filing');
    viewNonObj(o.cosAcc, 'Cost Accounting');
    viewObj(o.gstHst, 'GST/HST preparation and filing');
    viewObj(o.finRep, 'Financial Statements reparation');
    viewObj(o.corTax, 'Corporate tax preparation and filing');

    //-------------------- Personal tax preparation and filing --------------------------------

    if (o.perTax !== 0) {
        row = document.createElement('tr')
        row.innerHTML = `<td colspan = "3"><b>Personal tax preparation and filing</b></td>`
        t.appendChild(row)
    }

    //--------------------  --------------------------------
    viewPersObj(o.t1_Gen, 'T1 general');
    viewPersObj(o.GenInc, 'General Income');
    viewPersObj(o.ChlExp, 'Child Care Expenses');
    viewPersObj(o.movExp, 'Moving Expenses');
    viewPersObj(o.spoSup, 'Spousal support');
    viewPersObj(o.dedEmp, 'Deductible Employment Exp');
    viewPersObj(o.invInc, 'Investment Income');
    viewPersObj(o.invDed, 'Investment Deductions');
    viewPersObj(o.renInc, 'Rental Income');
    viewPersObj(o.selInc, 'Self-Employment Income');
    viewPersObj(o.selDed, 'Self-Employment Deductions');
    viewPersObj(o.selEmp, 'Self-Employment HST');
    viewPersObj(o.conBut, 'RRSP/PRPP Contributions');
    viewPersObj(o.tuiAmo, 'Tuition amount');
    viewPersObj(o.othCre, 'Other Credits');
    viewPersObj(o.forRep, 'Forein Reporting');
    viewPersObj(o.nonRes, 'Non-resident Income');

    row = document.createElement('tr')
    row.innerHTML = `<td class="t_r" style="font-size: 16px; text-transform: uppercase;" colspan = "2"><b>Total:&nbsp;&nbsp;&nbsp;<span "></b></td><td><b><span class="summ-price"></span></b></td>`
    t.appendChild(row)

    let rowCount = t.rows.length;
    let rows = t.rows;
    let total = 0;

    for (var i = 1; i < rowCount; i++) {
        let cell = rows[i].cells[2];
        if (cell !== undefined) {
            cell = Number(cell.innerText)
            total += cell;
        }
    }
    if (o.iPrice !== 'constructor') {
        total = o.price_tax;
    }

    $('.summ-price').text(total);

}


function viewPersObj(elem, title) {

    let id = Object.keys(elem);

    if (!($.isEmptyObject(elem))) {

        let title1 = title2 = title3 = title4 = title5 = "";
        if (elem.tax !== undefined) {
            title1 = title;
        } else if (elem.spo !== undefined) {
            title2 = title;
        } else if (elem.d1 !== undefined) {
            title3 = title;
        } else if (elem.d2 !== undefined) {
            title4 = title;
        } else if (elem.d3 !== undefined) {
            title5 = title;
        }

        if (!(elem.tax === undefined)) {
            row = document.createElement('tr')
            row.innerHTML = `<td>${title1}</td>
							 <td>tax</td>
							 <td>${elem.tax}</td>`
            document.querySelector('.view-obj').appendChild(row)
        }
        if (!(elem.spo === undefined)) {
            row = document.createElement('tr')
            row.innerHTML = `<td>${title2}</td>
						 	 <td>spo</td>
							 <td>${elem.spo}</td>`
            document.querySelector('.view-obj').appendChild(row)
        }
        if (!(elem.d1 === undefined)) {
            row = document.createElement('tr')
            row.innerHTML = `<td>${title3}</td>
							 <td>d1</td>
							 <td>${elem.d1}</td>`
            document.querySelector('.view-obj').appendChild(row)
        }

        if (!(elem.d2 === undefined)) {
            row = document.createElement('tr')
            row.innerHTML = `<td>${title4}</td>
							 <td>d2</td>
							 <td>${elem.d2}</td>`
            document.querySelector('.view-obj').appendChild(row)
        }
        if (!(elem.d3 === undefined)) {
            row = document.createElement('tr')
            row.innerHTML = `<td>${title5}</td>
							 <td>d3</td>
							 <td>${elem.d3}</td>`
            document.querySelector('.view-obj').appendChild(row)
        }
    }
}

function viewObj(elem, title) {
    if (!($.isEmptyObject(elem))) {
        row = document.createElement('tr')
        let id = Object.keys(elem)
        row.innerHTML = `<td>${title}</td>
						  		 <td>${id}</td>
						  		 <td>${elem[id]}</td>`
        document.querySelector('.view-obj').appendChild(row)
    }
}

function viewNonObj(elem, title) {
    if (!(elem === 0)) {
        row = document.createElement('tr')
        row.innerHTML = `<td>${title}</td>
						  		 <td></td>
						  		 <td>${elem}</td>`
        document.querySelector('.view-obj').appendChild(row)
    }
}

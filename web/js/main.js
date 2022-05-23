async function showRecords() {

    document.getElementById("loader").hidden = false;
    let response = await fetch('http://test/user/read.php');

    console.log(document.getElementById("loader").hidden);

    if (response.ok) { // если HTTP-статус в диапазоне 200-299

        document.getElementById('table_div').innerHTML = ''
        // получаем тело ответа (см. про этот метод ниже)
        let json = await response.json();
        console.log(json);

        //заполняем таблицу
        let table = document.createElement('table');
        let thead = document.createElement('thead');
        let tbody = document.createElement('tbody');

        table.appendChild(thead);
        table.appendChild(tbody);

        document.getElementById('table_div').appendChild(table);

        let row_1 = document.createElement('tr');
        let heading_1 = document.createElement('th');
        heading_1.innerHTML = "Name";
        let heading_2 = document.createElement('th');
        heading_2.innerHTML = "Email";
        let heading_3 = document.createElement('th');
        heading_3.innerHTML = "Phone";

        row_1.appendChild(heading_1);
        row_1.appendChild(heading_2);
        row_1.appendChild(heading_3);
        thead.appendChild(row_1);

        for(var j in json.records) {
            console.log(j, json.records[j]);
            let row_2 = document.createElement('tr');
            let row_2_data_1 = document.createElement('td');
            row_2_data_1.innerHTML = json.records[j].name;
            let row_2_data_2 = document.createElement('td');
            row_2_data_2.innerHTML = json.records[j].email;
            let row_2_data_3 = document.createElement('td');
            row_2_data_3.innerHTML = json.records[j].phone;

            row_2.appendChild(row_2_data_1);
            row_2.appendChild(row_2_data_2);
            row_2.appendChild(row_2_data_3);
            tbody.appendChild(row_2);
        }

        document.getElementById("loader").hidden = true;


    } else {
        alert("Записей нет, либо ошибка HTTP: " + response.status);
    }

}


async function deleteRecord(id) {
    if (confirm('Вы уверены что хотите удалить данного пользователя?')) {
        let response = await fetch('http://test/user/delete.php?id='+id);
        if (response.ok) { // если HTTP-статус в диапазоне 200-299
            // получаем тело ответа (см. про этот метод ниже)
            let json = await response.json();
            document.location.reload();
        }
    }
}
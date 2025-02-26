document.addEventListener("DOMContentLoaded", function () {
    loadMortgages();
});

// Загрузка списка ипотек
function loadMortgages() {
    fetch("/api/admin/mortgages")
        .then(response => response.json())
        .then(data => {
            let table = document.getElementById("mortgages-table");
            table.innerHTML = ""; 
            data.forEach(mortgage => {
                let row = `<tr>
                    <td>${mortgage.title}</td>
                    <td>${mortgage.percent}%</td>
                    <td>${mortgage.min_price} - ${mortgage.max_price} ₽</td>
                    <td>${mortgage.min_first_payment}%</td>
                    <td>${mortgage.min_term} - ${mortgage.max_term} лет</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editMortgage(${mortgage.id})">Редактировать</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteMortgage(${mortgage.id})">Удалить</button>
                    </td>
                </tr>`;
                table.innerHTML += row;
            });
        })
        .catch(error => console.error("ошибка", error));
}

// Открыть модалку для создания
function showCreateForm() {
    document.getElementById("mortgageId").value = "";
    document.getElementById("mortgageForm").reset();
    document.getElementById("mortgageModal").style.display = "block";
}

// Открыть модалку для редактирования
function editMortgage(id) {
    fetch(`/api/admin/mortgages/${id}`)
        .then(response => response.json())
        .then(mortgage => {
            document.getElementById("mortgageId").value = mortgage.id;
            document.getElementById("title").value = mortgage.title;
            document.getElementById("description").value = mortgage.description; 
            document.getElementById("percent").value = mortgage.percent;
            document.getElementById("min_price").value = mortgage.min_price;
            document.getElementById("max_price").value = mortgage.max_price;
            document.getElementById("min_first_payment").value = mortgage.min_first_payment;
            document.getElementById("min_term").value = mortgage.min_term;
            document.getElementById("max_term").value = mortgage.max_term;
            document.getElementById("is_active").checked = mortgage.is_active;

            document.getElementById("mortgageModal").style.display = "block";
        })
        .catch(error => console.error("ошибка", error));
}



// Сохранение ипотеки (создание или обновление)
function saveMortgage() {
    let mortgageId = document.getElementById("mortgageId").value;
    let title = document.getElementById("title").value;
    let description = document.getElementById("description").value; 
    let percent = parseFloat(document.getElementById("percent").value);
    let min_price = parseFloat(document.getElementById("min_price").value);
    let max_price = parseFloat(document.getElementById("max_price").value);
    let min_first_payment = parseInt(document.getElementById("min_first_payment").value);
    let min_term = parseInt(document.getElementById("min_term").value);
    let max_term = parseInt(document.getElementById("max_term").value);
    let is_active = document.getElementById("is_active").checked;

    if (percent > 40) {
        alert("Процентная ставка не может быть выше 40%");
        return;
    }
    if (min_first_payment > 98) {
        alert("Минимальный взнос не может быть выше 98%");
        return;
    }

    let mortgageData = {
        title: title,
        description: description,
        percent: percent,
        min_price: min_price,
        max_price: max_price,
        min_first_payment: min_first_payment,
        min_term: min_term,
        max_term: max_term,
        is_active: is_active
    };

    let method = mortgageId ? "PUT" : "POST";
    let url = mortgageId 
        ? `/api/admin/mortgages/${mortgageId}`
        : "/api/admin/mortgages";

    fetch(url, {
        method: method,
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(mortgageData)
    })
    .then(response => response.json())
    .then(data => {
        alert("Ипотека сохранена!");
        closeModal();
        loadMortgages(); 
    })
    .catch(error => console.error("ошибка", error));
}


function deleteMortgage(id) {
    if (confirm("Удалить?")) {
        fetch(`/api/admin/mortgages/${id}`, { method: "DELETE" })
            .then(() => loadMortgages());
    }
}

// Закрыть модальное окно
function closeModal() {
    document.getElementById("mortgageModal").style.display = "none";
}

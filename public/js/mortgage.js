document.addEventListener("DOMContentLoaded", function () {
    fetch(apiMortgagesUrl)
        .then(response => response.json())
        .then(data => {
            let table = document.getElementById("mortgages-table");
            data.forEach(mortgage => {
                let row = `<tr>
                    <td>${mortgage.title}</td>
                    <td>${mortgage.percent}%</td>
                    <td>${mortgage.min_price} - ${mortgage.max_price} ₽</td>
                    <td>${mortgage.min_first_payment}%</td>
                    <td>${mortgage.min_term} - ${mortgage.max_term} лет</td>
                    <td>
                        <button class="btn btn-primary" onclick="showDescription(${mortgage.id})">Описание</button>
                    </td>
                </tr>`;
                table.innerHTML += row;
            });
        })
        .catch(error => console.error("ошибка:", error));
});

function showDescription(id) {
    fetch(`/api/admin/mortgages/${id}`)
        .then(response => response.json())
        .then(mortgage => {
            document.getElementById("mortgageDescription").innerText = mortgage.description || "Описания нет";
            document.getElementById("descriptionModal").style.display = "block";
        })
        .catch(error => console.error("ошибка", error));
}

function closeDescriptionModal() {
    document.getElementById("descriptionModal").style.display = "none";
}


//Delete row on trash button click
const tableRows = document.getElementsByClassName("delete");
for (let i = 0; i < tableRows.length; ++i) {
    tableRows[i].onclick = function () {
        this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
    };
}


//Adding select on radio state change
let doInformRadio = document.getElementById('informRadio');
let dontInformRadio = document.getElementById('dontInformRadio');
document.getElementsByName("inform").forEach( elmnt => {
    elmnt.onclick = function() {
        if (elmnt===doInformRadio && document.getElementById("mySelect") == null) {
        const array = ["Головне національне відділення поліції", "Личаківський районний відділ поліції",
            "Шевченківський районний відділ поліції", "Франківський районний відділ поліції",
            "Залізничний районний відділ поліції", "Сихівський районний відділ поліції"];
        let selectList = document.createElement("select");
        selectList.classList.add("form-control");
        let selectDiv = document.createElement("div");
        selectDiv.classList.add("form-group");
        selectList.id = "mySelect";
        for (let i = 0; i < array.length; i++) {
            let option = document.createElement("option");
            option.value = array[i];
            option.text = array[i];
            selectList.appendChild(option);
        }
        const parent = this.parentNode.parentNode;
        const parentContainer = parent.parentNode;
        selectDiv.appendChild(selectList);
        parentContainer.insertBefore(selectDiv, parent.nextSibling);
        }
        else if (elmnt===dontInformRadio && document.getElementById("mySelect") != null) {
            let selectList = document.getElementById("mySelect");
            let formEl = selectList.parentNode.parentNode;
            formEl.removeChild(selectList.parentNode);
        }
    }
});


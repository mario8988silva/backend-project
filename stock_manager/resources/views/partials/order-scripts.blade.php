<script>
    window.orderTable = window.orderTable || {};

    orderTable.increment = function(id) {
        let row = document.querySelector(`[data-product-id="${id}"]`);
        let input = row.querySelector('.product-input');
        let ordered = row.querySelector('.product-ordered');

        let value = parseInt(input.value || 0) + 1;

        input.value = value;
        ordered.textContent = value;

        orderTable.updateSession(id, value);

        console.log("INCREMENT", {
            id
            , before: input.value
            , after: value
        });

    };


    orderTable.decrement = function(id) {
        let row = document.querySelector(`[data-product-id="${id}"]`);
        let input = row.querySelector('.product-input');
        let ordered = row.querySelector('.product-ordered');

        let value = Math.max(0, parseInt(input.value || 0) - 1);

        input.value = value;
        ordered.textContent = value;

        orderTable.updateSession(id, value);

        console.log("DECREMENT", {
            id
            , before: input.value
            , after: value
        });

    };

    orderTable.openDialog = function(id) {
        let row = document.querySelector(`[data-product-id="${id}"]`);
        let input = row.querySelector('.product-input');
        let dialog = document.getElementById(`dialog-${id}`);
        let dialogInput = document.getElementById(`dialog-input-${id}`);

        dialogInput.value = input.value;
        dialog.showModal();
    };

    orderTable.applyDialog = function(id) {
        let row = document.querySelector(`[data-product-id="${id}"]`);
        let input = row.querySelector('.product-input');
        let ordered = row.querySelector('.product-ordered');
        let dialogInput = document.getElementById(`dialog-input-${id}`);

        let value = parseInt(dialogInput.value || 0);

        input.value = value;
        ordered.textContent = value;

        orderTable.updateSession(id, value);

        document.getElementById(`dialog-${id}`).close();

        console.log("SET VIA DIALOG", {
            id
            , before: input.value
            , after: value
        });

    };

    orderTable.updateSession = function(id, quantity) {
        fetch("{{ route('order.session.update') }}", {
            method: "POST"
            , credentials: "same-origin"
            , headers: {
                "Content-Type": "application/json"
                , "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            }
            , body: JSON.stringify({
                product_id: id
                , quantity: quantity
            })
        })

.then(r => r.json()) .then(data => console.log("SESSION UPDATED", data)) .catch(err => console.error("SESSION UPDATE FAILED", err));

        console.log("SENDING TO SESSION", {
            id
            , quantity
        });
    };

</script>

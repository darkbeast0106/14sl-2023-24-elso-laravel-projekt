<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Todo</title>
</head>
<body>
    <main class="container">
        <section class="mt-3">
            <h2>Új teendő</h2>
            <form id="todo-form">
                <div>
                    <label class="form-label" for="title">Cím:</label>
                    <input class="form-control" type="text" id="title">
                </div>
                <button class="btn btn-primary" type="submit">Hozzáad</button>
            </form>
        </section>

        <section class="mt-3">
            <h2>Teendők</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cím</th>
                    </tr>
                </thead>
                <tbody id="todos">
                </tbody>
            </table>
        </section>
    </main>

    <script>
        async function getAllTodos() {
            const result = await fetch("/api/todo");
            const todos = await result.json();
            const todoTable = document.getElementById("todos");
            todoTable.textContent = "";
            todos.forEach(todo => {
                const tr = document.createElement("tr");
                const idTd = document.createElement("td");
                const titleTd = document.createElement("td");
                idTd.textContent = todo.id;
                titleTd.textContent = todo.title;
                tr.appendChild(idTd);
                tr.appendChild(titleTd);
                todoTable.appendChild(tr);
            });
        }

        async function createTodo() {
            const titleInput = document.getElementById("title");
            const title = titleInput.value;
            const result = await fetch("/api/todo", {
                method: "POST",
                body: JSON.stringify({title: title}),
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json"
                }
            });
            if (result.ok) {
                getAllTodos();
            } else {
                const data = await result.json();
                alert(data.message);
            }
        }

        document.getElementById("todo-form").addEventListener("submit", event => {
            event.preventDefault();
            createTodo();
        });

        getAllTodos();
    </script>
</body>
</html>
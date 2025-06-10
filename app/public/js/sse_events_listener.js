if (window.EventSource) {
  const eventSource = new EventSource("/sse/alert.php");

  eventSource.addEventListener("novo_aviso", function (event) {
    const data = JSON.parse(event.data);
    console.log("Novo aviso recebido:", event);
  });
}

document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('downloadFormat');
    
    selectElement.addEventListener('change', function(event) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        if (selectedOption.value) {
            downloadFile(selectedOption.value);
            selectElement.selectedIndex = 0; // Reset to default "Download"
        }
    });
});

async function downloadFile(format) {
    try {
        const response = await fetch('http://localhost/summit/backend/fetch_data.php'); // Replace with your fetch URL
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();

        switch (format) {
            case 'csv':
                downloadCSV(data);
                break;
            case 'pdf':
                downloadPDF(data);
                break;
            case 'excel':
                downloadExcel(data);
                break;
            case 'doc':
                downloadDOC(data);
                break;
            default:
                alert('Invalid format selected');
        }
    } catch (error) {
        console.error('Error fetching or downloading data:', error);
        // Handle error (e.g., show error message to user)
    }
}

function downloadCSV(data) {
    // Prepare CSV content with headers
    const headers = Object.keys(data[0]).map(key => key.toUpperCase()); // Uppercase headers
    const csvContent = "data:text/csv;charset=utf-8," 
        + headers.join(",") + "\n" // Headers
        + data.map(e => Object.values(e).join(",")).join("\n"); // Data

    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "data.csv");
    document.body.appendChild(link);

    link.click();
    document.body.removeChild(link);
}

function downloadPDF(data) {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Prepare headers and rows
    const headers = Object.keys(data[0]).map(key => key.toUpperCase());
    const rows = data.map(item => Object.values(item));

    // Use autoTable to generate the table
    doc.autoTable({
        head: [headers],
        body: rows,
        styles: { font: "helvetica", fontSize: 10 }
    });

    // Save the PDF
    doc.save('data.pdf');
}


function downloadExcel(data) {
    // Prepare Excel sheet with headers
    const ws = XLSX.utils.json_to_sheet(data);

    // Headers formatting
    const headers = Object.keys(data[0]).map(key => key.toUpperCase()); // Uppercase headers
    XLSX.utils.sheet_add_aoa(ws, [headers], { origin: -1 });

    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    XLSX.writeFile(wb, "data.xlsx");
}

function downloadDOC(data) {
    // Prepare DOC content with headers
    const doc = new docx.Document({
        sections: [{
            properties: {},
            children: [
                new docx.Paragraph(
                    new docx.TextRun({ text: Object.keys(data[0]).map(key => key.toUpperCase()).join(", "), bold: true })
                ),
                ...data.map(item => new docx.Paragraph(
                    new docx.TextRun({ text: Object.values(item).join(", "), bold: false })
                ))
            ],
        }],
    });

    docx.Packer.toBlob(doc).then(blob => {
        const link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "data.docx";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }).catch(err => console.log(err));
}

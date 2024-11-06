                                                /*=============== Trang mã khuyến mãi ===============*/


                                                
let currentPage = 1;
const itemsPerPage = 10; // Số lượng sản phẩm hiển thị trên mỗi trang
const promotions = [];

// Hàm để sinh dữ liệu cho các mã khuyến mãi
function generatePromotions(num) {
    for (let i = 1; i <= num; i++) {
        const discountPercentage = Math.floor(Math.random() * 101); // Giảm ngẫu nhiên từ 0% đến 100%
        const discountVND = Math.floor(Math.random() * 1000000); // Giảm ngẫu nhiên từ 0 đến 1.000.000 VNĐ
        const minOrderValue = Math.floor(Math.random() * 2000000); // Giá trị đơn hàng tối thiểu ngẫu nhiên
        const maxDiscountValue = Math.floor(Math.random() * 500000); // Số tiền giảm tối đa ngẫu nhiên

        const promo = {
            name: `Khuyến mãi ${i}`,
            code: `PROMO${i.toString().padStart(3, '0')}`, // Mã khuyến mãi sẽ có dạng PROMO001, PROMO002,...
            usageCount: Math.floor(Math.random() * 300), // Số lượt sử dụng ngẫu nhiên từ 0 đến 299
            discountPercentage: discountPercentage + '%', // Giảm theo phần trăm
            discountVND: discountVND.toLocaleString('vi-VN'), // Giảm theo VNĐ (định dạng với dấu phẩy)
            minOrderValue: minOrderValue.toLocaleString('vi-VN'), // Giá trị đơn hàng tối thiểu
            maxDiscountValue: maxDiscountValue.toLocaleString('vi-VN'), // Số tiền giảm tối đa
            date: `01/11/2024 - ${new Date(2024, 10, i % 30 + 1).toLocaleDateString('en-GB')}` // Ngày áp dụng
        };
        promotions.push(promo);
    }
}

// Gọi hàm để sinh 100 mã khuyến mãi
generatePromotions(100);

let filteredPromotions = promotions; // Biến lưu trữ danh sách đã lọc

function changePage(page) {
    currentPage = page;
    renderTable();
    renderPagination();
}

function renderTable() {
    const tableBody = document.getElementById('promo-table-body');
    tableBody.innerHTML = '';

    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedItems = filteredPromotions.slice(start, end);

    paginatedItems.forEach(promotion => {
        const row = `
            <tr>
                <td>${promotion.name}</td>
                <td>${promotion.code}</td>
                <td>${promotion.usageCount}</td>
                <td>${promotion.discountPercentage}</td>
                <td>${promotion.discountVND} VNĐ</td>
                <td>${promotion.minOrderValue} VNĐ</td>
                <td>${promotion.maxDiscountValue} VNĐ</td>
                <td>${promotion.date}</td>
                <td>
                    <button onclick="editPromotion(this.closest('tr'))">
                        <i class="fi fi-rs-edit edit-icon"></i>
                    </button>
                    <button onclick="deletePromotion('${promotion.code}')">
                        <i class="fi fi-rs-trash trash-icon"></i>
                    </button>
                </td>
            </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', row);
    });
}

function deletePromotion(code) {
    const promoIndex = promotions.findIndex(promo => promo.code === code);
    if (promoIndex > -1) {
        promotions.splice(promoIndex, 1);  // Cập nhật mảng gốc
        filteredPromotions = promotions;  // Cập nhật mảng đã lọc

        // Kiểm tra lại trang hiện tại sau khi xóa
        const totalPages = Math.ceil(filteredPromotions.length / itemsPerPage);
        if (currentPage > totalPages) {
            currentPage = totalPages;  // Nếu trang hiện tại vượt quá tổng số trang, chuyển về trang cuối cùng
        }

        renderTable();
        renderPagination();
    }
}

function renderPagination() {
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';

    const totalPages = Math.ceil(filteredPromotions.length / itemsPerPage);

    // Nút lùi về
    if (currentPage > 1) {
        const prevButton = document.createElement('li');
        prevButton.innerHTML = `<a href="#" class="pagination__link" onclick="goToPage(${currentPage - 1})">«</a>`;
        pagination.appendChild(prevButton);
    }

    // Trang đầu tiên
    const firstPage = document.createElement('li');
    firstPage.innerHTML = `<a href="#" class="pagination__link ${currentPage === 1 ? 'active' : ''}" onclick="goToPage(1)">1</a>`;
    pagination.appendChild(firstPage);

    // Dấu ba chấm nếu cần
    if (currentPage > 3) {
        const dots = document.createElement('li');
        dots.innerHTML = `<span class="pagination__dots">...</span>`;
        pagination.appendChild(dots);
    }

    // Hiển thị các trang xung quanh trang hiện tại
    for (let i = Math.max(2, currentPage - 1); i <= Math.min(totalPages - 1, currentPage + 1); i++) {
        const pageItem = document.createElement('li');
        pageItem.innerHTML = `<a href="#" class="pagination__link ${currentPage === i ? 'active' : ''}" onclick="goToPage(${i})">${i}</a>`;
        pagination.appendChild(pageItem);
    }

    // Dấu ba chấm trước trang cuối
    if (currentPage < totalPages - 2) {
        const dots = document.createElement('li');
        dots.innerHTML = `<span class="pagination__dots">...</span>`;
        pagination.appendChild(dots);
    }

    // Trang cuối
    if (totalPages > 1) {
        const lastPage = document.createElement('li');
        lastPage.innerHTML = `<a href="#" class="pagination__link ${currentPage === totalPages ? 'active' : ''}" onclick="goToPage(${totalPages})">${totalPages}</a>`;
        pagination.appendChild(lastPage);
    }

    // Nút tiến tới
    if (currentPage < totalPages) {
        const nextButton = document.createElement('li');
        nextButton.innerHTML = `<a href="#" class="pagination__link" onclick="goToPage(${currentPage + 1})">»</a>`;
        pagination.appendChild(nextButton);
    }
}

// Hàm đi tới trang mong muốn
function goToPage(page) {
    if (page >= 1 && page <= Math.ceil(filteredPromotions.length / itemsPerPage)) {
        currentPage = page;
        renderTable();
        renderPagination();
    }
}

// Khởi động trang đầu tiên
renderTable();
renderPagination();

let originalRowData = null; // Biến lưu trữ dữ liệu gốc
let currentEditingRow = null; // Biến lưu trữ hàng đang chỉnh sửa

function editPromotion(row) {
    const cells = row.querySelectorAll('td');

    // Nếu đã có hàng đang chỉnh sửa thì lưu lại hàng đó
    if (currentEditingRow && currentEditingRow !== row) {
        savePromotion(currentEditingRow);
    }

    // Kiểm tra nếu hàng đang chỉnh sửa đã được nhấn lại
    if (currentEditingRow === row) {
        // Lưu lại nếu nhấn lại hàng đang chỉnh sửa
        savePromotion(row);
    } else {
        // Lưu dữ liệu gốc
        originalRowData = Array.from(cells).map(cell => cell.innerHTML);

        // Chuyển đổi về chế độ chỉnh sửa
        cells.forEach((cell, index) => {
            if (index < cells.length - 1) { // Không chỉnh sửa cột thao tác
                const input = `<input type="text" value="${cell.innerHTML}" />`;
                cell.innerHTML = input; // Thay thế bằng input
            }
        });

        // Cập nhật nút về "Lưu" với biểu tượng tick và ẩn nút chỉnh sửa
        const editButton = row.querySelector('button:first-child');
        editButton.innerHTML = `<i class="fi fi-rs-check tick-icon"></i>`; // Thay đổi biểu tượng thành tick
        currentEditingRow = row; // Lưu hàng đang chỉnh sửa
    }
}

// Hàm lưu chỉnh sửa
function savePromotion(row) {
    const cells = row.querySelectorAll('td');
    const isConfirmed = confirm('Bạn có chắc chắn muốn lưu các thay đổi?');

    if (isConfirmed) {
        cells.forEach((cell, index) => {
            if (index < cells.length - 1) { // Không chỉnh sửa cột thao tác
                const input = cell.querySelector('input');
                cell.innerHTML = input.value; // Lấy giá trị từ input
                // Cập nhật dữ liệu vào mảng promotions
                const promoCode = originalRowData[1]; // Mã khuyến mãi
                if (index === 0) promotions.find(p => p.code === promoCode).name = input.value; // Cập nhật tên
                if (index === 3) promotions.find(p => p.code === promoCode).discountPercentage = input.value; // Cập nhật phần trăm giảm
                if (index === 4) promotions.find(p => p.code === promoCode).discountVND = input.value; // Cập nhật giá trị giảm
                if (index === 5) promotions.find(p => p.code === promoCode).minOrderValue = input.value; // Cập nhật giá trị đơn hàng tối thiểu
                if (index === 6) promotions.find(p => p.code === promoCode).maxDiscountValue = input.value; // Cập nhật số tiền giảm tối đa
                if (index === 7) promotions.find(p => p.code === promoCode).date = input.value; // Cập nhật ngày
            }
        });
    } else {
        // Nếu không xác nhận, khôi phục dữ liệu ban đầu
        resetRow(row);
    }

    // Khôi phục nút chỉnh sửa
    const editButton = row.querySelector('button:first-child');
    editButton.innerHTML = '<i class="fi fi-rs-edit edit-icon"></i>'; // Đặt lại biểu tượng chỉnh sửa
    currentEditingRow = null; // Đặt trạng thái về mặc định
}

// Hàm khôi phục lại dữ liệu
function resetRow(row) {
    const cells = row.querySelectorAll('td');
    cells.forEach((cell, index) => {
        if (index < cells.length - 1) { // Không chỉnh sửa cột thao tác
            cell.innerHTML = originalRowData[index]; // Khôi phục lại giá trị ban đầu
        }
    });
    // Cập nhật lại nút về "Chỉnh sửa"
    const editIcon = row.querySelector('.edit-icon');
    editIcon.innerHTML = '<i class="fi fi-rs-edit edit-icon"></i>';
}

// Khởi động trang đầu tiên
renderTable();
renderPagination();

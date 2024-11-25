<!DOCTYPE html>
<html lang="en">
  <!--=============== DOCUMENT HEAD ===============-->
  <?php include 'head.php'; ?>

<body>
   <!--=============== HEADER ===============-->
   <?php include 'header.php'; ?>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->

      <!--=============== ACCOUNTS ===============-->
                              <!-- Nút In -->
                              <button onclick="window.print()">
                                <i class="fi fi-rs-print table__trash "></i>
                              </button>
      <section class="accounts section--lg">
            <h3 class="tab__header">Invoice</h3>
            <div class="tab__body">
              <div class="invoice-container">
                <header class="header_invoice">
                  <div class="company-info">
                    <h1>GEAR STORE</h1>
                    <p>Work Hard Play Hard</p>
                    <p>HCM city</p>
                    <p>HCM City, 43000</p>
                    <p>Phone: 091-108-2004 | Fax: 000000000000</p>
                  </div>
                  <div class="invoice-info">
                    <h2>INVOICE</h2>
                    <input type="text" placeholder="Invoice #: 100" />
                    <input type="date" />
                  </div>
                </header>

                <section class="recipient-info">
                  <div class="to-info">
                    <p><strong>TO:</strong></p>
                    <input type="text" placeholder="Recipient Name" />
                    <input type="text" placeholder="Company Name" />
                    <input type="text" placeholder="Street Address" />
                    <input type="text" placeholder="City, ST ZIP Code" />
                    <input type="text" placeholder="Phone: Phone" />
                  </div>
                  <div class="ship-info">
                    <p><strong>SHIP TO:</strong></p>
                    <input type="text" placeholder="Recipient Name" />
                    <input type="text" placeholder="Company Name" />
                    <input type="text" placeholder="Street Address" />
                    <input type="text" placeholder="City, ST ZIP Code" />
                    <input type="text" placeholder="Phone: Phone" />
                  </div>
                </section>

                <section class="comments">
                  <p><strong>COMMENTS OR SPECIAL INSTRUCTIONS:</strong></p>
                  <textarea
                    placeholder="To get started right away, just tap any placeholder text and start typing to replace it with your own."
                    rows="3"
                  ></textarea>
                </section>

                <section class="table-section">
                  <table>
                    <thead>
                      <tr>
                        <th>Salesperson</th>
                        <th>P.O. Number</th>
                        <th>Requisitioner</th>
                        <th>Shipped Via</th>
                        <th>F.O.B Point</th>
                        <th>Terms</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="text" placeholder="" /></td>
                        <td><input type="text" placeholder="" /></td>
                        <td><input type="text" placeholder="" /></td>
                        <td><input type="text" placeholder="" /></td>
                        <td><input type="text" placeholder="" /></td>
                        <td><input type="text" value="Due on receipt" /></td>
                      </tr>
                    </tbody>
                  </table>

                  <table class="item-table">
                    <thead>
                      <tr>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="number" placeholder="0" /></td>
                        <td><input type="text" placeholder="" /></td>
                        <td>
                          <input type="number" step="0.01" placeholder="0.00" />
                        </td>
                        <td>
                          <input type="number" step="0.01" placeholder="0.00" />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </section>

                <section class="totals">
                  <p>
                    Subtotal:
                    <input type="number" step="0.01" placeholder="0.00" />
                  </p>
                  <p>
                    Sales Tax:
                    <input type="number" step="0.01" placeholder="0.00" />
                  </p>
                  <p>
                    Shipping & Handling:
                    <input type="number" step="0.01" placeholder="0.00" />
                  </p>
                  <p>
                    <strong>Total Due:</strong>
                    <input type="number" step="0.01" placeholder="0.00" />
                  </p>
                </section>
                <footer class="footer_invoice">
                  <p>
                    Make all checks payable to
                    <input type="text" placeholder="Company Name" />
                  </p>
                  <p>
                    If you have any questions concerning this invoice, contact
                    <input type="text" placeholder="Name, Phone, Email" />
                  </p>
                  <p><strong>Thank you for your business!</strong></p>
                </footer>
                <button class="button_invoice">Print</button>
              </div>
            </div>
      </section>
    </main>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>

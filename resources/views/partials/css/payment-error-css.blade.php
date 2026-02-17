<style>
.payment-status-container {
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    background: linear-gradient(135deg, #f5f7fa 0%, #e9ecf2 100%);
}

.status-card {
    background: white;
    border-radius: 30px;
    box-shadow: 0 30px 60px rgba(0,0,0,0.1);
    max-width: 600px;
    width: 100%;
    overflow: hidden;
    text-align: center;
}

.status-header-danger {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    padding: 40px 30px;
    color: white;
}

.status-icon {
    width: 100px;
    height: 100px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 3rem;
    border: 3px solid rgba(255,255,255,0.3);
}

.status-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.status-subtitle {
    font-size: 1rem;
    opacity: 0.9;
}

.status-body {
    padding: 40px;
}

.error-box {
    background: #ffebee;
    border-left: 5px solid #e74c3c;
    padding: 20px;
    border-radius: 12px;
    text-align: left;
    margin-bottom: 30px;
}

.error-box i {
    color: #e74c3c;
    font-size: 1.2rem;
    margin-right: 10px;
}

.error-details {
    background: #f8f9fa;
    border-radius: 16px;
    padding: 25px;
    margin: 30px 0;
    text-align: left;
}

.error-details h5 {
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 2px dashed #e0e0e0;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    padding: 5px 0;
}

.detail-label {
    color: #6c7a8a;
    font-weight: 500;
}

.detail-value {
    font-weight: 700;
    color: #2c3e50;
}

.error-message {
    background: #fff0f0;
    border-radius: 12px;
    padding: 15px;
    margin: 20px 0;
    color: #e74c3c;
    font-weight: 500;
    text-align: left;
    border: 1px solid #ffcdd2;
}

.error-message i {
    margin-right: 10px;
}

.reasons-list {
    background: #f8f9fa;
    border-radius: 16px;
    padding: 25px;
    margin: 30px 0;
    text-align: left;
}

.reasons-list h6 {
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.reasons-list ul {
    list-style: none;
    padding: 0;
}

.reasons-list li {
    padding: 8px 0;
    display: flex;
    align-items: center;
    gap: 10px;
    color: #6c7a8a;
}

.reasons-list li i {
    color: #e74c3c;
    font-size: 0.9rem;
}

.btn-retry {
    background: linear-gradient(135deg, #4a6fa5, #2c3e50);
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    margin: 10px 0;
}

.btn-retry:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(74,111,165,0.3);
    color: white;
}

.btn-dashboard {
    background: #f8f9fa;
    color: #2c3e50;
    border: 2px solid #e0e0e0;
    padding: 12px 30px;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    margin: 5px;
}

.btn-dashboard:hover {
    background: #e9ecef;
    color: #2c3e50;
}

.contact-support {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e0e0e0;
}

.contact-support p {
    color: #6c7a8a;
    margin-bottom: 15px;
}

.btn-whatsapp {
    background: #25D366;
    color: white;
    padding: 10px 25px;
    border-radius: 40px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: all 0.2s ease;
}

.btn-whatsapp:hover {
    background: #128C7E;
    color: white;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .status-header-danger {
        padding: 30px 20px;
    }
    
    .status-icon {
        width: 80px;
        height: 80px;
        font-size: 2rem;
    }
    
    .status-title {
        font-size: 1.5rem;
    }
    
    .status-body {
        padding: 30px 20px;
    }
    
    .btn-retry, .btn-dashboard {
        width: 100%;
        justify-content: center;
    }
}
</style>
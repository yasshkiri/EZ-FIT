/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Tools;



import Service.EquipemenetService;

import com.google.zxing.BarcodeFormat;
import com.google.zxing.BinaryBitmap;
import com.google.zxing.MultiFormatReader;
import com.google.zxing.NotFoundException;
import com.google.zxing.ReaderException;
import com.google.zxing.Result;
import com.google.zxing.WriterException;
import com.google.zxing.client.j2se.BufferedImageLuminanceSource;
import com.google.zxing.client.j2se.MatrixToImageWriter;
import com.google.zxing.common.BitMatrix;



import com.google.zxing.common.HybridBinarizer;
import com.google.zxing.qrcode.QRCodeWriter;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.sql.Connection;
import java.sql.SQLException;
import javax.imageio.ImageIO;



/**
 *
 * @author tchet
 */
public  class QrCode  {
    
   
     public  static void  getQRCodeImage(String text) throws WriterException, IOException, NotFoundException, SQLException, ReaderException {
        
              Connection connection = Maconnexion.getInstance().getCnx();
             EquipemenetService rs = new EquipemenetService();
             
             String  content = rs.getById().toString();
             File path= new File("C:\\Users\\LENOVO\\Desktop\\EasyFit\\qr.png");
              QRCodeWriter qrCodeWriter = new QRCodeWriter();
             BitMatrix bytMatrix = qrCodeWriter.encode(content, BarcodeFormat.QR_CODE, 300, 300);
                MatrixToImageWriter.writeToPath(bytMatrix,"PNG",path.toPath());
     BufferedImage bf = ImageIO.read(path);
          BinaryBitmap bitmap = new BinaryBitmap(new HybridBinarizer(
           new BufferedImageLuminanceSource(bf)));
    Result result = new MultiFormatReader().decode(bitmap);
          System.out.println(result.getText());
}
    
  

}

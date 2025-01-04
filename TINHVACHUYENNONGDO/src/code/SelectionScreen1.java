// SelectionScreen1.java
package code;

import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class SelectionScreen1 extends JFrame {
    private JLabel backgroundLabel;
    private JButton[] buttons;
    private JButton[] footerButtons;

    public SelectionScreen1() {
        setTitle("Công Cụ Tính Toán và Chuyển Đổi Nồng Độ");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(900, 600);
        setLayout(null);

        // Background image
        backgroundLabel = new JLabel() {
            @Override
            protected void paintComponent(Graphics g) {
                super.paintComponent(g);
                ImageIcon bgIcon = new ImageIcon(loadBackgroundImage("code/r/3.png"));
                g.drawImage(bgIcon.getImage(), 0, 0, getWidth(), getHeight(), null);
            }
        };
        backgroundLabel.setBounds(0, 0, 800, 600);
        add(backgroundLabel);

        // Buttons
        String[] buttonLabels = {"Tính toán nồng độ", "Chuyển đổi nồng độ", "Tính năng khác", "Thoát"};
        buttons = new JButton[buttonLabels.length];
        for (int i = 0; i < buttonLabels.length; i++) {
            buttons[i] = createCustomButton(buttonLabels[i], false, new Color(173, 216, 230), new Color(150, 200, 250));
            backgroundLabel.add(buttons[i]);
            if (buttonLabels[i].equals("Tính toán nồng độ")) {
                buttons[i].addActionListener(e -> {
                    new SelectionScreen2();
                    dispose();
                });
            } else if (buttonLabels[i].equals("Chuyển đổi nồng độ")) {
                buttons[i].addActionListener(e -> {
                    new SelectionScreen3();
                    dispose();
      
                });
            } else if (buttonLabels[i].equals("Tính năng khác")) {
                buttons[i].addActionListener(e -> {
                    JOptionPane.showMessageDialog(this, "Hệ thống đang trong quá trình cập nhật. Vui lòng quay lại sau!", "Thông báo", JOptionPane.INFORMATION_MESSAGE);
                });
            } else if (buttonLabels[i].equals("Thoát")) {
                buttons[i].addActionListener(e -> dispose());
            }
        }
            
            
        

        // Footer buttons
        String[] footerLabels = {"Trợ giúp", "Tra cứu", "Lịch sử"};
        footerButtons = new JButton[footerLabels.length];
        for (int i = 0; i < footerLabels.length; i++) {
            footerButtons[i] = createCustomButton(footerLabels[i], true, new Color(144, 238, 144), new Color(100, 200, 120));
            backgroundLabel.add(footerButtons[i]);
        }

        // Add resize listener
        addComponentListener(new ComponentAdapter() {
            @Override
            public void componentResized(ComponentEvent e) {
                resizeComponents();
            }
        });

        setLocationRelativeTo(null);
        setVisible(true);
        resizeComponents();
    }

    private void resizeComponents() {
        int width = getWidth();
        int height = getHeight();

        // Resize background
        backgroundLabel.setBounds(0, 0, width, height);

        // Resize main buttons
        int buttonWidth = (int) (width * 0.34);
        int buttonHeight = (int) (height * 0.08);
        int buttonX = (int) (width * 0.33); // Center buttons horizontally inside green boxes
        int buttonY = (int) (height * 0.25);
        int buttonSpacing = (int) (height * 0.12); // Space between buttons

        for (int i = 0; i < buttons.length; i++) {
            buttons[i].setBounds(buttonX, buttonY + i * buttonSpacing, buttonWidth, buttonHeight);
            buttons[i].setFont(new Font("Arial", Font.BOLD, (int) (height * 0.03)));
        }

        // Resize footer buttons
        int footerWidth = (int) (width * 0.15);
        int footerHeight = (int) (height * 0.08);
        int footerY = (int) (height * 0.85);
        int footerSpacing = (int) (width * 0.05);
        int footerX = (width - (footerButtons.length * footerWidth + (footerButtons.length - 1) * footerSpacing)) / 2;

        for (int i = 0; i < footerButtons.length; i++) {
            footerButtons[i].setBounds(footerX + i * (footerWidth + footerSpacing), footerY, footerWidth, footerHeight);
            footerButtons[i].setFont(new Font("Arial", Font.PLAIN, (int) (height * 0.025)));
        }
    }

    private JButton createCustomButton(String text, boolean isFooter, Color normalColor, Color hoverColor) {
        JButton button = new JButton(text) {
            @Override
            protected void paintComponent(Graphics g) {
                Graphics2D g2 = (Graphics2D) g;
                g2.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);

                if (getModel().isPressed()) {
                    g2.setColor(normalColor.darker());
                } else if (getModel().isRollover()) {
                    g2.setColor(hoverColor);
                } else {
                    g2.setColor(normalColor);
                }

                // Draw rounded button
                g2.fillRoundRect(2, 2, getWidth() - 4, getHeight() - 4, 20, 20);

                super.paintComponent(g);
            }

            @Override
            public void paintBorder(Graphics g) {
                Graphics2D g2 = (Graphics2D) g;
                g2.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);
                g2.setColor(Color.BLACK);
                g2.setStroke(new BasicStroke(3));
                g2.drawRoundRect(1, 1, getWidth() - 3, getHeight() - 3, 20, 20);
            }
        };

        button.setFont(new Font("Arial", Font.BOLD, 18));
        button.setForeground(Color.BLACK);
        button.setFocusPainted(false);
        button.setContentAreaFilled(false);
        button.setOpaque(false);

        button.addMouseListener(new MouseAdapter() {
            @Override
            public void mousePressed(MouseEvent e) {
                button.setForeground(Color.RED);
            }

            @Override
            public void mouseReleased(MouseEvent e) {
                button.setForeground(Color.BLACK);
            }

            @Override
            public void mouseEntered(MouseEvent e) {
                button.setForeground(Color.BLUE);
            }

            @Override
            public void mouseExited(MouseEvent e) {
                button.setForeground(Color.BLACK);
            }
        });

        return button;
    }

    private Image loadBackgroundImage(String path) {
        try {
            return new ImageIcon(getClass().getClassLoader().getResource(path)).getImage();
        } catch (Exception e) {
            System.out.println("Error loading background image: " + path);
            return null;
        }
    }
}

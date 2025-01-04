// MainScreen.java
package code;

import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class MainScreen {
    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> new MainScreenFrame());
    }
}

class MainScreenFrame extends JFrame {
    private JLabel backgroundLabel;
    private JButton startButton;

    // Original proportions for calculating button position
    private final double buttonWidthRatio = 0.25;
    private final double buttonHeightRatio = 0.08;
    private final double buttonHorizontalOffsetRatio = 0.48; // Centered and slightly left
    private final double buttonVerticalOffsetRatio = 0.5;

    public MainScreenFrame() {
        setTitle("Công Cụ Tính Toán và Chuyển Đổi Nồng Độ");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(900, 600);
        setLayout(new BorderLayout());

        // Set background image
        backgroundLabel = new JLabel() {
            @Override
            protected void paintComponent(Graphics g) {
                super.paintComponent(g);
                ImageIcon bgIcon = new ImageIcon(loadBackgroundImage("code/r/2.png"));
                g.drawImage(bgIcon.getImage(), 0, 0, getWidth(), getHeight(), null);
            }
        };
        backgroundLabel.setLayout(null); // Absolute positioning for the button
        add(backgroundLabel, BorderLayout.CENTER);

        // Add button "Bắt đầu"
        startButton = new JButton("BẮT ĐẦU") {
            @Override
            protected void paintComponent(Graphics g) {
                if (getModel().isPressed()) {
                    setBackground(new Color(150, 150, 255));
                } else if (getModel().isRollover()) {
                    setBackground(new Color(200, 200, 255));
                } else {
                    setBackground(new Color(173, 216, 230));
                }
                super.paintComponent(g);
            }
        };
        startButton.setFont(new Font("Arial", Font.BOLD, 20));
        startButton.setFocusPainted(false);
        startButton.setForeground(Color.BLACK);
        startButton.setContentAreaFilled(false);
        startButton.setOpaque(true);
        startButton.setBorder(BorderFactory.createLineBorder(new Color(100, 100, 255), 2, true));
        resizeComponents();

        // Add hover effect
        startButton.addMouseListener(new MouseAdapter() {
            @Override
            public void mouseEntered(MouseEvent e) {
                startButton.setForeground(Color.BLUE);
            }

            @Override
            public void mouseExited(MouseEvent e) {
                startButton.setForeground(Color.BLACK);
            }

            @Override
            public void mousePressed(MouseEvent e) {
                startButton.setForeground(Color.RED);
            }

            @Override
            public void mouseReleased(MouseEvent e) {
                startButton.setForeground(Color.BLUE);
            }
        });

        startButton.addActionListener(e -> {
            new SelectionScreen1(); // Open SelectionScreen1
            dispose(); // Close the current MainScreenFrame
        });

        backgroundLabel.add(startButton);

        // Listener for resizing
        addComponentListener(new java.awt.event.ComponentAdapter() {
            @Override
            public void componentResized(java.awt.event.ComponentEvent e) {
                resizeComponents();
            }
        });

        setLocationRelativeTo(null);
        setVisible(true);
    }

    private void resizeComponents() {
        backgroundLabel.repaint();
        int buttonWidth = (int) (getWidth() * buttonWidthRatio);
        int buttonHeight = (int) (getHeight() * buttonHeightRatio);
        int buttonX = (int) (getWidth() * buttonHorizontalOffsetRatio - buttonWidth / 2);
        int buttonY = (int) (getHeight() * buttonVerticalOffsetRatio - buttonHeight / 2);
        startButton.setBounds(buttonX, buttonY, buttonWidth, buttonHeight);
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

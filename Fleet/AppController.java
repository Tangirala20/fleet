package com.example.fleetapplicationprojectlast;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class AppController {
	@Autowired
	private AdminRepository adminRepo;
	@Autowired
	private DriverInfoRepository drivRepo;
	@Autowired
	private FleetInfoRepository fleetRepo;
	@GetMapping("/")
	public String index()
	{
		return "index";
	}
	@PostMapping("/register")
    public String create(Admin admin) {
		adminRepo.save(admin);
		return "trial";
			
	}
	@GetMapping("/table")
		public String table() {
		return "table";
	}
}
